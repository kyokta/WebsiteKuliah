<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostImageController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/postPhoto",
     *     tags={"Post Photo"},
     *     summary="Upload a photo",
     *     description="Endpoint to upload a photo with title and description",
     *     operationId="postPhoto",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="title",
     *                     description="Title of the photo",
     *                     @OA\Schema(type="string")
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     description="Description of the photo",
     *                     @OA\Schema(type="string")
     *                 ),
     *                 @OA\Property(
     *                     property="image",
     *                     description="Image file to be uploaded",
     *                     type="string",
     *                     format="binary"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Successful operation"
     *     )
     * )
     */
    public function storeImage(Request $request)
    {
        $image = $request->only([
            'title',
            'description',
            'image'
        ]);

        if (empty($image['title']) && empty($image['description']) && empty($image['image'])) {
            return new \Exception('Data belum lengkap', 400);
        }

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('image')->storeAs('posts_image', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }

        $post = new Post;
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return response()->json(['message' => 'Data berhasil disimpan', 'success' => true], 200);
    }

    public function getImage(){
        $data = Post::all();
        $picture = [];
        foreach ($data as $item) {
            $detail = [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'picture' => $item->picture,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ];
            array_push($picture, $detail);
        }

        return response()->json($picture);
    }
}
