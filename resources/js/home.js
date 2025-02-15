$(document).ready(function () {
    $('#influencerTable').DataTable();
    $('#campaignTable').DataTable();

    $('#influencers').select2({
        multiple: true,
        placeholder: "Selecione os influenciadores",
        allowClear: true
    });
    

});
