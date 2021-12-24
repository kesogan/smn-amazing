jQuery(function() {
    // initialize data
    console.log('dqssqdqd');
    let $uploadCrop;
    // let loader = jQuery('#loader');
    let croupModal = jQuery('#upload-modal');
    let uploadFrontImageInput = jQuery("#upload-front-image-input");
    let uploadBackImageInput = jQuery("#upload-back-image-input");
    let currentPreviewImageStatute = '';

    let uploadFormFlag = false;
    croupModal.modal("hide");

    const previewImageStatus = {
        FRONT_IMAGE: 'front-image',
        BACK_IMAGE: 'back-image'
    };

    // load file from the input
    function readFile(input) {
        if (input.files && input.files[0]) {
            // Get image type
            const fileType = input.files[0]['type'];
            const fileSize = input.files[0].size/1024/1024;
            // Valid image types array
            const validImageTypes = ['image/gif', 'image/GIF', 'image/jpeg', 'image/JPEG',
                'image/png', 'image/PNG', 'image/jpg', 'image/JPG'];
            if (validImageTypes.includes(fileType)) {
                // valid image size
                if (fileSize < 3) {
                    // initialize the image reader
                    let reader = new FileReader();

                    // When the reader is loaded
                    reader.onload = function (e) {
                        // Show the cropper modal
                        croupModal.modal("show");
                        jQuery("#avatar").attr('src', e.target.result);
                        let avatar = document.getElementById('avatar');

                        croupModal.on("shown.bs.modal", function(e) {
                            console.log("The modal is shown")
                            console.log("The cropper value is", $uploadCrop)

                            if(!$uploadCrop) {
                                // Init cropper
                                $uploadCrop = new Cropper(avatar, {
                                    viewMode: 1,
                                    aspectRatio: 16/9,
                                    responsive: true,
                                    guides: false,
                                    autoCropArea: 0.8,
                                    movable: false,
                                    scalable: false,
                                    highlight: false,
                                    dragMode: 'move',
                                    toggleDragModeOnDblclick: false,
                                    ready: function () {
                                        // loader.hide();
                                        uploadFormFlag = true;
                                    }
                                });
                            }
                        }).on("hidden.bs.modal", function(e) {
                            //Detroy the cropper instance
                            if($uploadCrop) {
                                $uploadCrop.destroy();
                                $uploadCrop = undefined;
                            }
                            uploadFormFlag = false;

                            console.log("The modal is hidden")
                            console.log("The cropper value is", $uploadCrop)
                        });
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    console.log('Images size, current size is ' + fileType);
                    notification('Erreur d\'image', 'Image trop loude, choisissez une image de moins de 3Mo',
                        'danger', 'fa fa-remove', 'bounceIn', 'bounceOut', 3000);
                }
            } else {
                console.log('Images type error, current type is ' + fileType);
                notification('Erreur d\'image', 'Type de fichier non réconnu, l\'image doit être de type: gif, jpg, jpeg ou png',
                    'danger', 'fa fa-remove', 'bounceIn', 'bounceOut', 3000);
            }
        }
        else {
            // loader.hide();
            croupModal.modal('hide');

            console.log("Sorry - you're browser doesn't support the FileReader API");
            notification('Erreur d\'image','Navigateur internet non compatible, utiliser un autre navigateur s\'il vous palais',
                'danger', 'fa fa-remove', 'bounceIn', 'bounceOut', 3000);
        }
    }

    function preview(base64Image) {
        let preview = "<img alt='...' src='" + base64Image + "' class='img-responsive'/>";
        // Load to the correct preview

        try {
            // console.log('currentPreviewImageStatute = ',currentPreviewImageStatute);
            jQuery("#"+currentPreviewImageStatute).next().val(base64Image);
            jQuery("#"+currentPreviewImageStatute).next().next().replaceWith(preview);
            /*uploadFrontImageInput.next().val(base64Image);
            uploadFrontImageInput.next().next().replaceWith(preview);
        } else if (currentPreviewImageStatute === previewImageStatus.BACK_IMAGE) {
            uploadBackImageInput.next().val(base64Image);
            uploadBackImageInput.next().next().replaceWith(preview);*/
        } catch (e) {
            notification('File error','Impossible de pévisualiser cette image, réessayer plus tard', 'danger',
                'fa fa-remove', 'bounceIn', 'bounceOut', 3000);
        }

        croupModal.modal("hide");
        // loader.hide();
    }

    let list = jQuery(".image-upload");

    console.log({list});

    for (let item in Object.keys(list).filter( a => /\d/.test(a) == true)) {

        list[item].addEventListener('change', function(event) {
            // loader.show();
            currentPreviewImageStatute = event.currentTarget.id;
            jQuery('.modal-title').text('Rogner l\'image');
            readFile(this);
        });
    }

    /*uploadFrontImageInput.on('change', function () {
        // loader.show();
        currentPreviewImageStatute = previewImageStatus.FRONT_IMAGE;
        jQuery('.modal-title').text('Rogner l\'image de face');
        readFile(this);
    });

    uploadBackImageInput.on('change', function () {
        // loader.show();
        currentPreviewImageStatute = previewImageStatus.BACK_IMAGE;
        jQuery('.modal-title').text('Rogner l\'image arrière');
        readFile(this);
    });*/

    jQuery("#image-upload-add-button").on("click", function(event){
        event.preventDefault();

        let id = Math.random().toString(36).substring(7);
        let image_url = jQuery(this).data('url');

        jQuery("#image-upload-div").append(`
            <div class=" col-lg-6  col-md-6 col-sm-12 col-xs-12">
                <div class="b-add-veh">
                    <div class="add-veh add-elt">
                        <span class="btn-file cni no-background-image">
                            <input type="file" class="image-upload" id="image`+ id +`">
                            <input type="hidden" name="image`+ id +`" value="{{ old('`+ id +`') }}">
                            <img src="`+ image_url +`" class="img-responsive" alt="..."/>
                        </span>
                    </div>
                </div>
            </div>
        `);
        let list = jQuery(".image-upload");

        console.log({list});

        for (let item in Object.keys(list).filter( a => /\d/.test(a) == true)) {

            list[item].addEventListener('change', function(event) {
                // loader.show();
                currentPreviewImageStatute = event.currentTarget.id;
                jQuery('.modal-title').text('Rogner l\'image');
                readFile(this);
            });
        }
    });

    jQuery("#save-image").click(function () {
        // Load image if the is a preview
        if(uploadFormFlag) {
            // loader.fadeIn();

            console.log("Get the result");
            // Get the image result
            var resultFile = $uploadCrop
                .getCroppedCanvas({ width: 388, height: 200 })
                .toDataURL('image/png');

            console.log("Result OK");
            // Get only if the image src exist
            if (resultFile) {
                console.log("Send store ajax request with the image");
                // Store image in backend
                preview(resultFile);
            } else {
                console.log("Conversion error, the object is " + resultFile);
                notification('File error','Une erreur s\'est produite, réessayer plus tard', 'danger',
                    'fa fa-remove', 'bounceIn', 'bounceOut', 3000);
            }
        } else {
            // No image loaded
            console.log("No image loaded");
            notification('File error', 'Il vous faut d\'abord choisir une image', 'danger',
                'fa fa-remove', 'bounceIn', 'bounceOut', 3000);
        }
    });
});
