<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactSendmail;
use App\Models\ContactCategory;
use App\Models\Contact;
use App\Models\GeneralDefinition;


class ContactController extends Controller
{
    public function contact()
    {
        $contactCategories = ContactCategory::where('DEL_FLG','=','0')->orderBy('SPARE1')->orderBy('CONTACT_CATEGORY_ID')->get();
        return view('contact' ,compact('contactCategories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->all();
        $contactCategory = ContactCategory::where('CONTACT_CATEGORY_ID','=',$request->CONTACT_CATEGORY_ID)->first();
        return view('confirm', compact('contact', 'contactCategory'));
    }

    public function send(Request $request)
    {
        //DBに登録する
        $contact = Contact::create($request->all());
        //ランダムなIDを生成し、問い合わせ番号とする
        $code = ContactCategory::select('REFERENCE_CODE')
        ->where('CONTACT_CATEGORY_ID','=', $request->CONTACT_CATEGORY_ID)->first();
        $referenceId = "";
        for($i=0;$i<6;$i++){
            $referenceId.=mt_rand(0,9);
        }
        $referenceId = $code['REFERENCE_CODE'] . $contact->CONTACT_ID . $referenceId;
        $referenceId = substr($referenceId, 0, 8);
        $contact->update(["REFERENCE_NUMBER" => $referenceId]);
        $contact['CONTACT_CATEGORY_NAME'] = $request->CONTACT_CATEGORY_NAME;

        //管理者に通知メールを知らせる
        $sendMail = GeneralDefinition::select('ITEM')->where('DEFINITION', '=', 'contact')->first();
        \Mail::send(new ContactSendmail($contact,'mail_kanri', $sendMail));
        //入力されたメールに返信する
        \Mail::send(new ContactSendmail($contact,'mail', null));

        $request->session()->regenerateToken();
        return redirect()->route('contact')
        ->with('message', 'フォームが送信されました。返答をお待ちください。');
    }
}
?>
