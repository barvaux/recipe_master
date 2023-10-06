$(function(){

    $('.delete').click(function(){
        if(!confirm('Etes-vous sûr de vouloir supprimer cette catégorie ? ')){
            return false;
        }
            
    });
});