const url = 'http://localhost:8080';
window.addEventListener("load", () => {
    //Boton like
    function like(){
        $('.btn-like').unbind('click').click(function(){
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src','img/heart-grey.png');
            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    console.log(response);
                }
            });
            dislike();
        });
    }
    like();

    function dislike(){
        $('.btn-dislike').unbind('click').click(function(){
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src','img/heart.png');
            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    console.log(response);
                }
            });
            like();
        });

    }
    dislike();



}
);
