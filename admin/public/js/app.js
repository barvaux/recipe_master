$(function(){

    $('.delete').click(function(){
        if(!confirm('Êtes-vous sûr de vouloir supprimer cet élément ? ')){
            return false;
        }
            
    });
});

