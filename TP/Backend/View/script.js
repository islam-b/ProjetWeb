

$(document).ready(function() {
   

    var id_ecole=$('#id_ecole').attr("value");

    $("#selection_type").change(function(){
        if ($("#selection_type").val()=="0") {
                $("#selection_type").css("display","none");
                $("#type_input").css("display","inline"); 
                $("#formation_form input:eq(2)").removeAttr("disabled");
                $("#formation_form input:eq(3)").removeAttr("disabled");
                $("#formation_form input:eq(4)").removeAttr("disabled");
        }
    });

    var new_formation=function(with_type) {
        
        var nom=$("#formation_form input:eq(0)").val();
        var volume=$("#formation_form input:eq(2)").val();
        var ht=$("#formation_form input:eq(3)").val();
        var taxe=$("#formation_form input:eq(4)").val();
        var nom_type=$("#formation_form input:eq(1)").val();
              
        $.ajax({url:"../Controller/insertion.php",type:"POST",data:{nom_formation:nom,with_type:with_type,nom_type:nom_type, volume_h:volume, prixht:ht, tax:taxe,id_ecole:id_ecole},   success:function (data){

            location.reload();
             
            }});
        
        
    }
    
    $("#new_formation").click(function() {
        new_formation($("#selection_type").val());
    });
    

    
    $(".delete_type").click(function () {
        $.ajax({url:"../Controller/suppression.php",type:"POST",data:{id:$(this).val(),type:1}, success:function (data){
            location.reload(); 
        }});
    });
    
    $(".delete_form").click(function () {
        $.ajax({url:"../Controller/suppression.php",type:"POST",data:{id:$(this).val(),type:0}, success:function (data){
            location.reload(); 
            
        }});
    });
    

    $(".save_type").click(function() {
       var id_form= $(this).val();
       
        var nom_type=$("#form_"+id_form+" td:eq(0) input").val();
        var volume=$("#form_"+id_form+" td:eq(1) input").val();
        var prixHT=$("#form_"+id_form+" td:eq(2) input").val();
        var taxe=$("#form_"+id_form+" td:eq(3) input").val();
         console.log(nom_type+"_"+volume+"_"+prixHT+"_"+taxe);
         $.ajax({url:"../Controller/update.php",type:"POST",data:{type:1,id_type:id_form,nom_type:nom_type,volume:volume, prixHt:prixHT, taxe:taxe},   success:function (data){
                 
            location.reload();
              //console.log(data);
            }});
        
    });
    
    $(".edit_type").click(function() {
        var id_type=$(this).val();
        $("#form_"+id_type).css("display","table-row");
            $("#type_row_"+id_type).css("display","none");
    });
    
     $(".save_form").click(function() {
        var id_form= $(this).val();
        var nom_form=$("#form_input_"+id_form+" input").val();
         $.ajax({url:"../Controller/update.php",type:"POST",data:{type:0,id_form:id_form,nom_form:nom_form},   success:function (data){
                 
             location.reload();
              console.log(data);
            }});
        
     });
    
    $(".edit_form").click(function() {
        var id_form=$(this).val();
        $("#form_input_"+id_form).css("display","list-item");
            $("#form_item_"+id_form).css("display","none");
    });
    
   
    $("#login").click(function() {
        $("#cadre").css('display','block');
        $("body").css('background-color','#aaaaaa');
        $("body > *:not(#cadre)").css('filter','blur(5px) contrast(0.8) brightness(60%)');
        $("#cancel").click(function() {
                $("#cadre").css('display','none'); 
                $("body").css('background-color','');
                $("body > *:not(#cadre)").css('filter','');
        });
        
    });
    
    $("#logout").click(function() {
 
        $.ajax({url:"../Controller/deconnexion.php",type:"POST",data:{}, success:function(data) {
                 
                     window.location.replace("../../Frontend/Controller/index.php");
                
        }
               });
        
    });
    
    
    $("#signin").click(function() {
        var username=$("#cadre>form input:eq(0)").val();
        var password=$("#cadre>form input:eq(1)").val();
        console.log( username + password);
        $.ajax({url:"../Controller/connexion.php",type:"POST",data:{username:username, password:password}, success:function(data) {
                 
                    // console.log(data);
                     location.reload(true);
                  
                 
        }
               });
    });
        
    
    var getStyle=function() {
        $.ajax({url:"../View/getStyle.php",success:function(data) {
            console.log(data);
            var theme=JSON.parse(data);
            for(i=0;i<theme.length;i++) {
            var th= $('<div class="theme" value="'+theme[i].id+'"></div>');
            th.css("background-color",theme[i].primaryColor);
            th.click(function() {
                var id=$(this).attr("value");
                console.log(id);
                 $.ajax({url:"../Controller/updateTheme.php",type:"POST",data:{id:id},success:function(data) {}});
            });
            var line=$('<div class="bd"><div>');
            line.css("background-color",theme[i].secondaryColor);
            
            var title=$('<h2>Title<h2>');
            title.css("font-family",theme[i].title);
            
            var text=$('<p class="tx">This is some text<p>');
            text.css("font-family",theme[i].font);
            text.css("color",theme[i].textColor);
            
            th.append(line);
            th.append(title);
            th.append(text);
            $("#themes_container").append(th);
                
            }
            
        }});
    }
    
    getStyle();

 
   /* $("#saveTheme").click(function() {
        var titlefont=$("#themeForm select:eq(0)").val();
        var backgroundColor=$("#themeForm input:eq(0)").val();
        var borderColor=$("#themeForm input:eq(1)").val();
       var font=$("#themeForm select:eq(1)").val();
         var textColor=$("#themeForm input:eq(3)").val();
        
       $.ajax({url:"../Controller/update_theme.php",type:"POST",data:{title:titlefont, primaryColor:backgroundColor, secondaryColor:borderColor, textColor:textColor, font:font}, success:function(data) {
                 
                    console.log(data);
                    // window.location.replace("../Controller/index.php");
                  
                 
        }});
    
    });*/
    
    

    
});

