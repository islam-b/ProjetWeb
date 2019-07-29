$(document).ready(function() {

    function diaporama() {
        var i=$("#diapo_container img").attr('alt');
        i++;
        if (i>3) i=1;
        $("#diapo_container img").replaceWith('<img class="ml-auto mr-auto diapo" src="View/src/images/d'+i+'.jpg" alt="'+i+'" width=\"100%\">');

    }

    setInterval(function(){diaporama()},3000);

    $('#tab_ecole').DataTable();

    $('#inscrip_form input').click(function(){$(this).removeClass("alert-danger");$(this).attr("placeholder","")});
    $('#signup_btn').click(function(){
       var username=$('#inscrip_form input:eq(0)').val();
       var password=$('#inscrip_form input:eq(1)').val();
       var password2=$('#inscrip_form input:eq(2)').val();
        var nom=$('#inscrip_form input:eq(3)').val();
        var prenom=$('#inscrip_form input:eq(4)').val();
        var empty=false;

        if (username=="") {
            empty=true;
            $('#inscrip_form input:eq(0)').attr("val","");
            $('#inscrip_form input:eq(0)').attr("placeholder","Veuillez saisir un peudonyme !");
            $('#inscrip_form input:eq(0)').addClass("alert-danger");
        }
        if (password=="") {
            empty=true;
            $('#inscrip_form input:eq(1)').attr("val","");
            $('#inscrip_form input:eq(1)').attr("placeholder","Veuillez saisir un mot de passe !");
            $('#inscrip_form input:eq(1)').addClass("alert-danger");
        }
        if ((password2=="")||(password!==password2)) {
            empty=true;
            $('#inscrip_form input:eq(2)').attr("val","");
            $('#inscrip_form input:eq(2)').attr("placeholder","Veuillez confirmer votre mot de passe !");
            $('#inscrip_form input:eq(2)').addClass("alert-danger");
        }
        if (nom=="") {
            empty=true;
            $('#inscrip_form input:eq(3)').attr("val","");
            $('#inscrip_form input:eq(3)').attr("placeholder","Veuillez saisir un nom !");
            $('#inscrip_form input:eq(3)').addClass("alert-danger");
        }
        if (prenom=="") {
            empty=true;
            $('#inscrip_form input:eq(4)').attr("val","");
            $('#inscrip_form input:eq(4)').attr("placeholder","Veuillez saisir un prenom !");
            $('#inscrip_form input:eq(4)').addClass("alert-danger");
        }
        if (empty!==true) {
            $.ajax({
                url: 'Controller/Requetes.php', type: 'POST',
                data: {
                    num: 1,
                    username: username,
                    password: password,
                    nom: nom,
                    prenom: prenom
                },
                success: function (res) {
                    console.log(res);
                    var data=JSON.parse(res);
                    if (data[0]==0) {
                        $('#inscrip_form input:eq(0)').val("");
                        $('#inscrip_form input:eq(0)').attr("placeholder",data[1]);
                        $('#inscrip_form input:eq(0)').addClass("alert-danger");
                    } else{
                        if (data[0]==-1) {

                        } else location.reload(true);
                    }

                }
            });
        }
    });

    $('#deconex_btn').click(function() {
        $.ajax({url:"Controller/Requetes.php",type:"POST",data:{num:3},success:function(data){
               location.reload(true);
            }});
    });

    $('#connex_form input').click(function(){$(this).removeClass("alert-danger");$(this).attr("placeholder","")});
    $('#signin_btn').click(function(){
       var username=$('#connex_form input:eq(0)').val();
       var password=$('#connex_form input:eq(1)').val();
       var empty=false;
        if (username=="") {
            empty=true;
            $('#connex_form input:eq(0)').attr("val","");
            $('#connex_form input:eq(0)').attr("placeholder","Veuillez saisir un peudonyme !");
            $('#connex_form input:eq(0)').addClass("alert-danger");
        }
        if (password=="") {
            empty=true;
            $('#connex_form input:eq(1)').attr("val","");
            $('#connex_form input:eq(1)').attr("placeholder","Veuillez saisir un mot de passe !");
            $('#connex_form input:eq(1)').addClass("alert-danger");
        }
        if (empty!==true) {
            $.ajax({
                url: 'Controller/Requetes.php', type: 'POST',
                data: {
                    num: 2,
                    username: username,
                    password: password,
                },
                success: function (res) {
                    console.log(res);
                    var data=JSON.parse(res);
                    switch (data[0]) {
                        case -2:{
                            $('#connex_form input:eq(1)').val("");
                            $('#connex_form input:eq(1)').attr("placeholder",data[1]);
                            $('#connex_form input:eq(1)').addClass("alert-danger");
                        }break;
                        case -1:{

                        }break;
                        case 0:{
                            $('#connex_form input:eq(0)').val("");
                            $('#connex_form input:eq(0)').attr("placeholder",data[1]);
                            $('#connex_form input:eq(0)').addClass("alert-danger");
                        }break;
                        default: {
                            location.reload(true);
                        }
                    }
                }
            });
        }
    });

    $('#comment_form textarea').click(function() {$(this).removeClass("alert-danger");});
    $("#comment_form button").click(function(){
       var id_ecole=$(this).val();
       var comment=$('#comment_form textarea').val();
       console.log(id_ecole+" "+comment);
       if (comment=="") {
           $('#comment_form textarea').addClass("alert-danger");
       }else {
           send_comment(id_ecole,comment,0);
       }
    });

    $('.form_ans textarea').click(function() {$(this).removeClass("alert-danger");});

    $(".form_ans button").click(function(){

        var id_comment=$(this).attr("value");
        var id_ecole=$('#answer_form_'+id_comment+' input').val();
        var comment=$('#answer_form_'+id_comment+' textarea').val();
        console.log(id_comment+" "+id_ecole+" "+comment);
        if (comment=="") {
            $('#answer_form_'+id_comment+' textarea').addClass("alert-danger");
        }else {
            send_comment(id_ecole,comment,id_comment);
        }
    });

    function send_comment(id_ecole,comment,is_answer_to) {
        $.ajax({url:"Controller/Requetes.php",type:'POST',data:{num:4,id_ecole:id_ecole,comment:comment,is_answer_to:is_answer_to},success:function (res){
            location.reload(true);
        } });
    }

    $("#select_form select:eq(0)").change(function(){
        var val=$(this).val();
        $.ajax({url:"Controller/Requetes.php",type:'POST',data:{num:5,type:val},success:function(data){

            var res=JSON.parse(data);
            var i=0;
            $('#select_form select:eq(1)').removeAttr("disabled");
            $('#select_form select:eq(1)').html('');
            $('#select_form select:eq(2)').removeAttr("disabled");
            $('#select_form select:eq(2)').html('');
            for (i=0;i<res.length;i++) {
                $('#select_form select:eq(1)').append($('<option value="'+res[i]['id_ecole']+'"></option>').append(res[i]['nom']));
                $('#select_form select:eq(2)').append($('<option value="'+res[i]['id_ecole']+'"></option>').append(res[i]['nom']));
            }
            }
        });
    });

    $("#select_form select:eq(1)").change(function(){
        var id_ecole=$(this).val();
        $.ajax({url:"Controller/Requetes.php",type:'POST',data:{num:6,id_ecole:id_ecole},success:function(data){
            console.log(data);
            var content=JSON.parse(data);
            $("#school_tab1 tbody").html(content[0]);
            $("#school_comment1").html(content[1]);
            }
        });
    });
    $("#select_form select:eq(2)").change(function(){
        var id_ecole=$(this).val();
        $.ajax({url:"Controller/Requetes.php",type:'POST',data:{num:6,id_ecole:id_ecole},success:function(data){
                var content=JSON.parse(data);
                $("#school_tab2 tbody").html(content[0]);
                $("#school_comment2").html(content[1]);
            }
        });
    });


});