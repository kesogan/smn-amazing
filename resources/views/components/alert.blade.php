<script>
        jQuery.noConflict();
        function notification(notificationMessage, notificationType, notificationDelay, notificationTitle = 'SMN DESIGN', ) {
            jQuery.notify({
                title: notificationTitle,
                message: notificationMessage
            }, {
                type: notificationType,
                delay: notificationDelay,
                showProgressbar: true,
                animate: {
                    enter: 'animate fadeInRight',
                    exit: 'animate fadeOutRight'
                },
                placement: {
                    from: 'top',
                    align: 'right'
                },
                template: `
                            <div class="column dt-sc-one-half space first dt-flash-bar">
                                <div data-notify="type" class="dt-sc-{0}-box aligncenter">
                                    <span></span>
                                    <h4 data-notify="title"> {1} </h4>
                                    {2}
                                    <div class="dt-sc-progress dt-sc-progress-striped dt-progress-bar-{0}" data-notify="progressbar">
                                        <div class="dt-sc-bar" style="width: 0%;">
                                            <div class="dt-sc-bar-text"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          `
            });
        }

        function info_flash(message, delay = 5000) {
            notification(message, 'info', delay);
        }

        function success_flash(message, delay = 4000) {
            notification(message, 'success', delay);
        }
        function warning_flash(message, delay = 5000) {
            notification(message, 'warning', delay);
        }
        function error_flash(message, delay = 5000) {
            notification(message, 'error', delay);
        }
    </script>

@if(session()->has('popup.message'))
    <script>
        notification(
            "{{ session('popup.message') }}",
            "{{ session('popup.type') }}",
            "{{ session('popup.delay') }}",
            "{{ session('popup.title') }}"
        );
    </script>
@endif
{{-- Example of call the notification in JavaScript --}}
{{-- notification('Server error', 'Une erreur s\'est produite sur le serveur, réessayez plus tard', 'info', 30000); --}}


{{-- Example of call the notification in PHP --}}
{{-- We use helper methode declared into the GeneralHelper.php  --}}
{{-- info_flash_message("Bonjour") --}}
{{-- success_flash_message("Bonjour") --}}
