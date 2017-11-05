<?php

class Zero_Upload{

    public function __construct(){
        add_action ( 'init', array( $this, 'handle_files'));
        add_shortcode( 'doc-upload', array( $this , 'upload' ));
    }

    public function upload(){
    ?>
        <form method="post" enctype="multipart/form-data">
            <p>Documenti:
            <input type="file" name="documenti[]" />
            <input type="file" name="documenti[]" />
            <input type="file" name="documenti[]" />
            <input type="submit" value="Invia" />
            </p>
        </form>    
    <?php
    }


    public function handle_files(){
        if ( isset($_FILES['documenti']) ) {

            $upload_dir = Zero::get_instance()->upload_dir;

            var_dump( '<pre>', $_FILES['documenti'] );
            foreach ($_FILES["documenti"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["documenti"]["tmp_name"][$key];
                    $name = $_FILES["documenti"]["name"][$key];
                    move_uploaded_file($tmp_name, $upload_dir.'/'.$name);
                } else {
                    echo 'errore durante il caricamento file';
                }
            }
        }
    }

}

new Zero_Upload();