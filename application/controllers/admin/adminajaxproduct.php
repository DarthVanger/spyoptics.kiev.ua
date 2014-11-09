<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminAjaxProduct extends CI_Controller
{
    /**
     * Update the product with ajax request
     * Currently works only for updating product's image with uploaded file
     */
    public function update()
    {
        $MAIN_HEIGHT = 800;
        $THUMBNAIL_HEIGHT = 60;
        $MINI_HEIGHT = 300;

        $THUMBNAIL_FOLDER = 'thumbnail/';
        $MINI_FOLDER = 'mini/';

        $imagesFolderPath = 'assets/img/';
        $uploadPathInImagesFolder = 'upload/product/';
        $uploadPath = $imagesFolderPath . $uploadPathInImagesFolder;

        $uploadResult = $this->do_upload($uploadPath); 
        var_dump($uploadResult);
        $uploadedFileInfo = $uploadResult['upload_data'];

        $this->load->model('ImageResizer');

        /* resize the image */
        $resizedImgPath = $this->ImageResizer->resize($uploadedFileInfo['full_path'], $MAIN_HEIGHT);
        // move resized file (it will replace the original uploaded file)
        $destinationDir = './' . $uploadPath;
        rename($resizedImgPath, $destinationDir . $uploadedFileInfo['file_name']);

        $thumbnailImgPath = $this->ImageResizer->resize($uploadedFileInfo['full_path'], $THUMBNAIL_HEIGHT);
        // move resized file
        $destinationDir = './' . $uploadPath . $THUMBNAIL_FOLDER;
        rename($thumbnailImgPath, $destinationDir . $uploadedFileInfo['file_name']);

        $miniImgPath = $this->ImageResizer->resize($uploadedFileInfo['full_path'], $MINI_HEIGHT);
        // move resized file
        $destinationDir = './' . $uploadPath . $MINI_FOLDER;
        rename($miniImgPath, $destinationDir . $uploadedFileInfo['file_name']);
        
        $product = array();
        $product['id'] = $_POST['id']; 
        $product['img_path'] = $uploadPathInImagesFolder . $uploadedFileInfo['file_name'];
        $product['thumbnail_img_path'] = $uploadPathInImagesFolder . $THUMBNAIL_FOLDER . $uploadedFileInfo['file_name'];
        $product['mini_img_path'] = $uploadPathInImagesFolder . $MINI_FOLDER . $uploadedFileInfo['file_name'];

        $this->load->model('SunglassesModel');

        $this->SunglassesModel->update($product);
    }

    function do_upload($uploadPath)
    {
        $config['upload_path'] = './' . $uploadPath;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width']  = '10024';
        $config['max_height']  = '10024';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            return $data;
        }
    }
}
