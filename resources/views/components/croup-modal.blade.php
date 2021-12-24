@component('components.layout-modal', [
    'id_modal' => $id_modal,
    'title_modal' => "Rogner l'image",
    'size_modal' => "modal-lg"
    ])
    {{ $slot }}
    <div class="flex">
        <button type="button" class="btn btn-light ml-1 mr-1" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success ml-1 mr-1" id="{{ $id_save_btn }}">Enrégistrer</button>
    </div>
@endcomponent
