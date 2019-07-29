$(document).ready(function() {

    function diaporama() {
        var i = $("#diapo_container img").attr('alt');
        i++;
        if (i > 3) i = 1;
        $("#diapo_container img").replaceWith('<img class="ml-auto mr-auto diapo" src="View/src/images/d' + i + '.jpg" alt="' + i + '" width=\"100%\">');

    }

    setInterval(function () {
        diaporama()
    }, 3000);

    $('#tab_ecole').DataTable();

    $('#inscrip_form input').click(function () {
        $(this).removeClass("alert-danger");
        $(this).attr("placeholder", "")
    });
    $('#signup_btn').click(function () {
        var username = $('#inscrip_form input:eq(0)').val();
        var password = $('#inscrip_form input:eq(1)').val();
        var password2 = $('#inscrip_form input:eq(2)').val();
        var nom = $('#inscrip_form input:eq(3)').val();
        var prenom = $('#inscrip_form input:eq(4)').val();
        var empty = false;

        if (username == "") {
            empty = true;
            $('#inscrip_form input:eq(0)').attr("val", "");
            $('#inscrip_form input:eq(0)').attr("placeholder", "Veuillez saisir un peudonyme !");
            $('#inscrip_form input:eq(0)').addClass("alert-danger");
        }
        if (password == "") {
            empty = true;
            $('#inscrip_form input:eq(1)').attr("val", "");
            $('#inscrip_form input:eq(1)').attr("placeholder", "Veuillez saisir un mot de passe !");
            $('#inscrip_form input:eq(1)').addClass("alert-danger");
        }
        if ((password2 == "") || (password !== password2)) {
            empty = true;
            $('#inscrip_form input:eq(2)').attr("val", "");
            $('#inscrip_form input:eq(2)').attr("placeholder", "Veuillez confirmer votre mot de passe !");
            $('#inscrip_form input:eq(2)').addClass("alert-danger");
        }
        if (nom == "") {
            empty = true;
            $('#inscrip_form input:eq(3)').attr("val", "");
            $('#inscrip_form input:eq(3)').attr("placeholder", "Veuillez saisir un nom !");
            $('#inscrip_form input:eq(3)').addClass("alert-danger");
        }
        if (prenom == "") {
            empty = true;
            $('#inscrip_form input:eq(4)').attr("val", "");
            $('#inscrip_form input:eq(4)').attr("placeholder", "Veuillez saisir un prenom !");
            $('#inscrip_form input:eq(4)').addClass("alert-danger");
        }
        if (empty !== true) {
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
                    var data = JSON.parse(res);
                    if (data[0] == 0) {
                        $('#inscrip_form input:eq(0)').val("");
                        $('#inscrip_form input:eq(0)').attr("placeholder", data[1]);
                        $('#inscrip_form input:eq(0)').addClass("alert-danger");
                    } else {
                        if (data[0] == -1) {

                        } else location.reload(true);
                    }

                }
            });
        }
    });

    $('#deconex_btn').click(function () {
        $.ajax({
            url: "Controller/Requetes.php", type: "POST", data: {num: 3}, success: function (data) {
                location.reload(true);
            }
        });
    });

    $('#connex_form input').click(function () {
        $(this).removeClass("alert-danger");
        $(this).attr("placeholder", "")
    });
    $('#signin_btn').click(function () {
        var username = $('#connex_form input:eq(0)').val();
        var password = $('#connex_form input:eq(1)').val();
        var empty = false;
        if (username == "") {
            empty = true;
            $('#connex_form input:eq(0)').attr("val", "");
            $('#connex_form input:eq(0)').attr("placeholder", "Veuillez saisir un peudonyme !");
            $('#connex_form input:eq(0)').addClass("alert-danger");
        }
        if (password == "") {
            empty = true;
            $('#connex_form input:eq(1)').attr("val", "");
            $('#connex_form input:eq(1)').attr("placeholder", "Veuillez saisir un mot de passe !");
            $('#connex_form input:eq(1)').addClass("alert-danger");
        }
        if (empty !== true) {
            $.ajax({
                url: 'Controller/Requetes.php', type: 'POST',
                data: {
                    num: 2,
                    username: username,
                    password: password,
                },
                success: function (res) {
                    console.log(res);
                    var data = JSON.parse(res);
                    switch (data[0]) {
                        case -2: {
                            $('#connex_form input:eq(1)').val("");
                            $('#connex_form input:eq(1)').attr("placeholder", data[1]);
                            $('#connex_form input:eq(1)').addClass("alert-danger");
                        }
                            break;
                        case -1: {

                        }
                            break;
                        case 0: {
                            $('#connex_form input:eq(0)').val("");
                            $('#connex_form input:eq(0)').attr("placeholder", data[1]);
                            $('#connex_form input:eq(0)').addClass("alert-danger");
                        }
                            break;
                        default: {
                            location.reload(true);
                        }
                    }
                }
            });
        }
    });

    $('#comment_form textarea').click(function () {
        $(this).removeClass("alert-danger");
    });
    $("#comment_form button").click(function () {
        var id_ecole = $(this).val();
        var comment = $('#comment_form textarea').val();
        console.log(id_ecole + " " + comment);
        if (comment == "") {
            $('#comment_form textarea').addClass("alert-danger");
        } else {
            send_comment(id_ecole, comment, 0);
        }
    });

    $('.form_ans textarea').click(function () {
        $(this).removeClass("alert-danger");
    });

    $(".form_ans button").click(function () {

        var id_comment = $(this).attr("value");
        var id_ecole = $('#answer_form_' + id_comment + ' input').val();
        var comment = $('#answer_form_' + id_comment + ' textarea').val();
        console.log(id_comment + " " + id_ecole + " " + comment);
        if (comment == "") {
            $('#answer_form_' + id_comment + ' textarea').addClass("alert-danger");
        } else {
            send_comment(id_ecole, comment, id_comment);
        }
    });

    function send_comment(id_ecole, comment, is_answer_to) {
        $.ajax({
            url: "Controller/Requetes.php",
            type: 'POST',
            data: {num: 4, id_ecole: id_ecole, comment: comment, is_answer_to: is_answer_to},
            success: function (res) {
                location.reload(true);
            }
        });
    }

    $("#select_form select:eq(0)").change(function () {
        var val = $(this).val();
        $.ajax({
            url: "Controller/Requetes.php", type: 'POST', data: {num: 5, type: val}, success: function (data) {

                var res = JSON.parse(data);
                var i = 0;
                $('#select_form select:eq(1)').removeAttr("disabled");
                $('#select_form select:eq(1)').html('');
                $('#select_form select:eq(2)').removeAttr("disabled");
                $('#select_form select:eq(2)').html('');
                for (i = 0; i < res.length; i++) {
                    $('#select_form select:eq(1)').append($('<option value="' + res[i]['id_ecole'] + '"></option>').append(res[i]['nom']));
                    $('#select_form select:eq(2)').append($('<option value="' + res[i]['id_ecole'] + '"></option>').append(res[i]['nom']));
                }
            }
        });
    });

    $("#select_form select:eq(1)").change(function () {
        var id_ecole = $(this).val();
        $.ajax({
            url: "Controller/Requetes.php", type: 'POST', data: {num: 6, id_ecole: id_ecole}, success: function (data) {
                console.log(data);
                var content = JSON.parse(data);
                $("#school_tab1 tbody").html(content[0]);
                $("#school_comment1").html(content[1]);
            }
        });
    });
    $("#select_form select:eq(2)").change(function () {
        var id_ecole = $(this).val();
        $.ajax({
            url: "Controller/Requetes.php", type: 'POST', data: {num: 6, id_ecole: id_ecole}, success: function (data) {
                var content = JSON.parse(data);
                $("#school_tab2 tbody").html(content[0]);
                $("#school_comment2").html(content[1]);
            }
        });
    });

    $("#new_school_form button").click(function () {
        var nom = $('#new_school_form input:eq(0)').val();
        var type = $('#new_school_form select').val();
        var wilaya = $('#new_school_form input:eq(1)').val();
        var commune = $('#new_school_form input:eq(2)').val();
        var adresse = $('#new_school_form input:eq(3)').val();
        var telephone = $('#new_school_form input:eq(4)').val();

        console.log(nom + " " + type + " " + wilaya + " " + commune + " " + adresse + " " + telephone);
        $.ajax({
            url: "Controller/Requetes",
            type: 'POST',
            data: {
                num: 4,
                nom: nom,
                type: type,
                wilaya: wilaya,
                commune: commune,
                adresse: adresse,
                telephone: telephone
            },
            success: function (data) {
                console.log(data);
            }
        });

    });

    $("#edit_school_c select:eq(0)").change(function () {
        var type = $(this).val();
        $.ajax({
            url: "Controller/Requetes.php", type: 'POST', data: {num: 5, type: type}, success: function (data) {
                $("#school_list").html(data);
                $('#edit_school_form').html('');
                $(".school_link").click(function () {

                    $('.school_link').removeClass('selected_school');
                    $(this).addClass('selected_school');
                    var id_school = $(this).attr("value");
                    $.ajax({
                        url: "Controller/Requetes.php",
                        type: 'POST',
                        data: {num: 6, id_school: id_school},
                        success: function (data) {
                            $('#edit_school_form').html(data);
                            $('#edit_school_form button').click(function () {
                                var nom = $('#edit_school_form input:eq(0)').val();
                                var wilaya = $('#edit_school_form input:eq(1)').val();
                                var commune = $('#edit_school_form input:eq(2)').val();
                                var adresse = $('#edit_school_form input:eq(3)').val();
                                var telephone = $('#edit_school_form input:eq(4)').val();
                                console.log(nom + " " + type + " " + wilaya + " " + commune + " " + adresse + " " + telephone);
                                $.ajax({
                                    url: "Controller/Requetes",
                                    type: 'POST',
                                    data: {
                                        num: 7,
                                        nom: nom,
                                        type: type,
                                        wilaya: wilaya,
                                        commune: commune,
                                        adresse: adresse,
                                        telephone: telephone,
                                        id_ecole: id_school
                                    },
                                    success: function (data) {
                                        console.log(data);
                                    }

                                });
                            });
                        }
                    });
                });
            }
        });
    });

    $("#gestion_mise_ligne select").change(function () {
        var type = $(this).val();
        $.ajax({
            url: "Controller/Requetes.php", type: 'POST', data: {num: 8, type: type}, success: function (data) {
                $("#gestion_mise_ligne table").html(data);
                $(".enable_s").click(function () {
                    var id_school = $(this).val();
                    $.ajax({
                        url: "Controller/Requetes.php",
                        type: 'POST',
                        data: {num: 9, id_ecole: id_school, state: 1},
                        success: function (data) {
                            console.log("id" + id_school + " state" + " " + data);
                        }
                    });
                });
                $(".disable_s").click(function () {
                    var id_school = $(this).val();
                    $.ajax({
                        url: "Controller/Requetes.php",
                        type: 'POST',
                        data: {num: 9, id_ecole: id_school, state: 0},
                        success: function (data) {
                            console.log("id" + id_school + " state" + " " + data);
                        }
                    });
                });
                $('.delete_sc').click(function () {
                    var id_school = $(this).val();
                    console.log("id_ecole:" + id_school);
                    $.ajax({
                        url: "Controller/Requetes.php",
                        type: 'POST',
                        data: {num: 10, id_ecole: id_school},
                        success: function (data) {
                            console.log(data);
                            $.ajax({
                                url: "Controller/Requetes.php",
                                type: 'POST',
                                data: {num: 8, type: type},
                                success: function (r) {
                                    $("#school_" + id_school).remove();
                                }
                            });
                        }
                    });
                });
            }
        });
    });

    $('.enable_com').click(function () {
        var id_user = $(this).val();
        console.log(id_user + "dff");

        $.ajax({
            url: "Controller/Requetes.php",
            type: "POST",
            data: {num: 11, id_user: id_user, allow: 1},
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.disable_com').click(function () {
        var id_user = $(this).val();
        $.ajax({
            url: "Controller/Requetes.php",
            type: "POST",
            data: {num: 11, id_user: id_user, allow: 0},
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('#gestion_com_c select:eq(0)').change(function () {
        var type = $(this).val();
        $.ajax({
            url: "Controller/Requetes.php", type: "POST", data: {num: 12, type: type}, success: function (data) {

                $('#gestion_com_c select:eq(1)').removeAttr('disabled');
                $('#gestion_com_c select:eq(1)').html(data);
                $('#gestion_com_c select:eq(1)').change(function () {
                    var id_ecole = $(this).val();
                    $.ajax({
                        url: "Controller/Requetes.php",
                        type: "POST",
                        data: {num: 13, id: id_ecole,from_user:0},
                        success: function (data) {
                            console.log(data);
                            $('#gestion_com_c table:eq(1)').html(data);
                            $(".delete_com").click(function(){
                                var id_comm=$(this).val();
                                $.ajax({url:"Controller/Requetes.php",type:"POST",data:{num:14,id_comm:id_comm},success:function(data){
                                        console.log(data);
                                        $("#comm_"+id_comm).remove();
                                    }
                                });

                            });
                        }
                    });

                });
            }
        });

    });
    $('#gestion_com_c select:eq(2)').change(function () {
        var id_user=$(this).val();
        $.ajax({url:"Controller/Requetes.php",type:'POST',data:{num:13,id:id_user,from_user:1},success:function(data) {
                console.log(data);
                $('#gestion_com_c table:eq(1)').html(data);
                $(".delete_com").click(function(){
                    var id_comm=$(this).val();
                    $.ajax({url:"Controller/Requetes.php",type:"POST",data:{num:14,id_comm:id_comm},success:function(data){
                            console.log(data);
                            $("#comm_"+id_comm).remove();

                        }
                    });

                });

        }});
    });

    $('.delete_member').click(function(){
        var id_user=$(this).val();
        $.ajax({
            url: "Controller/Requetes.php",
            type: "POST",
            data: {num: 15, id_user: id_user},
            success: function (data) {
                console.log(data);
                $('#user_'+id_user).remove();
            }
        });
    });

    $("#role_update select:eq(0)").change(function(){
        var id_user=$(this).val();
        $.ajax({
            url: "Controller/Requetes.php",
            type: "POST",
            data: {num: 16, id_user: id_user},
            success: function (data) {
                console.log(data);
                var res=JSON.parse(data);
                $("#role_update select:eq(1)").val(res[0]);
                if (res[0]!=="Utilisateur") {
                    $('#at_title').removeClass("invisible");
                    $("#role_update select:eq(2)").removeClass("invisible");
                    $("#role_update select:eq(2)").val(res[1]);
                }
            }
        });
    });

    $("#role_update select:eq(1)").change(function(){
        var r=$(this).val();
        if (r!=="Utilisateur") {
            $('#at_title').removeClass("invisible");
            $("#role_update select:eq(2)").removeClass("invisible");
        }
        else {
            $('#at_title').addClass("invisible");
            $("#role_update select:eq(2)").addClass("invisible");
        }
    });


    $("#role_update button").click(function(){
        var id_user=$("#role_update select:eq(0)").val();
        var role=$("#role_update select:eq(1)").val();
        if (role!=="Utilisateur") var is_employee=$("#role_update select:eq(2)").val();
        else var is_employee=0;

        $.ajax({url:"Controller/Requetes.php",type:"POST",data:{num:17,id_user:id_user,role:role,is_employee:is_employee},
        success:function(data){
            location.reload();
        }
        });


    });


});

