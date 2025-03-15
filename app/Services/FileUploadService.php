<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class FileUploadService
{
    public function uploadFiles($files, $uploadDir, $request)
    {
            // 単一のファイルの場合は配列に変換
        if (!is_array($files)) {
            $files = [$files];
        }

        foreach ($files as $file) {
            // ファイルが有効かチェック
            if ($file->isValid()) {
                // 元のファイル名
                $originalFileName = $file->getClientOriginalName();

                // ファイルの拡張子
                $extension = $file->getClientOriginalExtension();

                // ファイルのMIMEタイプ
                $mimeType = $file->getMimeType();

                // ファイルサイズ（バイト）
                $size = $file->getSize();

                // ファイルサイズの制限（5MB）
                $maxSize = 5 * 1024 * 1024; // 5MB in bytes

                if ($size > $maxSize) {
                    \Log::warning("ファイルサイズが制限を超えています: {$originalFileName}, サイズ: {$size}");
                    return ['success' => false, 'message' => "ファイルサイズが制限を超えています: {$originalFileName}, サイズ: {$size}"];
                }

                // 許可されるMIMEタイプ
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif' , 'image/avif'];

                if (!in_array($mimeType, $allowedMimeTypes)) {
                    \Log::warning("無効なファイルタイプです: {$originalFileName}, タイプ: {$mimeType}");
                    return ['success' => false, 'message' => "無効なファイルタイプです: {$originalFileName}, タイプ: {$mimeType}"];
                }

                try {
                    // ユニークなIDを生成
                    $uniqueId = uniqid();

                    // 新しいファイル名を生成（元のファイル名 + ユニークID + 拡張子）
                    $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $uniqueId . '.' . $extension;

                    // ファイルを保存
                    $storedPath = $file->storeAs($uploadDir, $newFileName, 'public');

                    // DBへ保存
                    Image::create([
                        'FILE_NAME' => $newFileName,
                        'FILE_PATH' => 'storage/img/' . basename($uploadDir) . '/',
                        'COMMENT' => $request->COMMENT,
                        'VIEW_FLG' => $request->VIEW_FLG,
                        'PRIORITY' => $request->PRIORITY
                    ]);

                    \Log::info("ファイルがアップロードされました: 元のファイル名: {$originalFileName}, 新しいファイル名: {$newFileName}, サイズ: {$size}, タイプ: {$mimeType}, 保存先: {$storedPath}");
                } catch (\Exception $e) {
                    \Log::error("ファイルのアップロード中にエラーが発生しました: {$originalFileName}. エラー: " . $e->getMessage());
                    return ['success' => false, 'message' => "ファイルのアップロード中にエラーが発生しました: {$originalFileName}. エラー: " . $e->getMessage()];
                }
            } else {
                \Log::warning("無効なファイルです: {$file->getClientOriginalName()}");
                return ['success' => false, 'message' => "無効なファイルです: {$file->getClientOriginalName()}"];
            }
        }
        return ['success' => true, 'message' => 'ファイルが正常にアップロードされました。'];
    }

    public function updateFiles($files, $uploadDir, $request, $img)
    {
            // 単一のファイルの場合は配列に変換
        if (!is_array($files)) {
            $files = [$files];
        }

        foreach ($files as $file) {
            // ファイルが有効かチェック
            if ($file->isValid()) {
                // 元のファイル名
                $originalFileName = $file->getClientOriginalName();

                // ファイルの拡張子
                $extension = $file->getClientOriginalExtension();

                // ファイルのMIMEタイプ
                $mimeType = $file->getMimeType();

                // ファイルサイズ（バイト）
                $size = $file->getSize();

                // ファイルサイズの制限（5MB）
                $maxSize = 5 * 1024 * 1024; // 5MB in bytes

                if ($size > $maxSize) {
                    \Log::warning("ファイルサイズが制限を超えています: {$originalFileName}, サイズ: {$size}");
                    return ['success' => false, 'message' => "ファイルサイズが制限を超えています: {$originalFileName}, サイズ: {$size}"];
                }

                // 許可されるMIMEタイプ
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/avif'];

                if (!in_array($mimeType, $allowedMimeTypes)) {
                    \Log::warning("無効なファイルタイプです: {$originalFileName}, タイプ: {$mimeType}");
                    return ['success' => false, 'message' => "無効なファイルタイプです: {$originalFileName}, タイプ: {$mimeType}"];
                }

                try {
                    // ユニークなIDを生成
                    $uniqueId = uniqid();

                    // 新しいファイル名を生成（元のファイル名 + ユニークID + 拡張子）
                    $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $uniqueId . '.' . $extension;

                    // ファイルを保存
                    $storedPath = $file->storeAs($uploadDir, $newFileName, 'public');

                    // DBへ保存
                    $img->update([
                        'FILE_NAME' => $newFileName,
                        'SPARE1' => $request->SPARE1
                    ]);

                    \Log::info("ファイルがアップロードされました: 元のファイル名: {$originalFileName}, 新しいファイル名: {$newFileName}, サイズ: {$size}, タイプ: {$mimeType}, 保存先: {$storedPath}");
                } catch (\Exception $e) {
                    \Log::error("ファイルのアップロード中にエラーが発生しました: {$originalFileName}. エラー: " . $e->getMessage());
                    return ['success' => false, 'message' => "ファイルのアップロード中にエラーが発生しました: {$originalFileName}. エラー: " . $e->getMessage()];
                }
            } else {
                \Log::warning("無効なファイルです: {$file->getClientOriginalName()}");
                return ['success' => false, 'message' => "無効なファイルです: {$file->getClientOriginalName()}"];
            }
        }
        return ['success' => true, 'message' => 'ファイルが正常にアップロードされました。'];
    }

    public function deleteFile($filePath)
    {


        if (Storage::disk('public')->delete(str_replace('storage/','',$filePath))) {
            return true;

        }
        return false;
    }
}
