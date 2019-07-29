

$(document).ready(function() {


    var id_ecole = $('#id_ecole').attr("value");

    function refresh_formations() {
        
        $.ajax({url:"../View/refresh_view.php",type:"POST",data:{area:'ul',id_ecole:id_ecole}, success:function(data) {
               
                $("ul").replaceWith(data);
            
        }});
        
        $.ajax({url:"../View/refresh_view.php",type:"POST",data:{area:'tbody',id_ecole:id_ecole}, success:function(data) {
                
                   $("table").replaceWith(data);
                    calculerTTC();
        }});
}
    
   
    function calculerTTC() {
        var j;
        for(j=0;j<$("tbody>tr").length;j++) {
            $("#tableau>tbody>tr:eq("+j+")>td:eq(3)").text((parseInt($("#tableau>tbody>tr:eq("+j+")>td:eq(2)").text())/100 * parseInt($("#tableau>tbody>tr:eq("+j+")>td:eq(1)").text()))+parseInt($("#tableau>tbody>tr:eq("+j+")>td:eq(1)").text()) + " DA");
        }
    }
    
    
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
                 
                     location.reload(true);
                
        }
               });
        
    });
    
    
    $("#signin").click(function() {
        var username=$("#cadre>form input:eq(0)").val();
        var password=$("#cadre>form input:eq(1)").val();
        console.log( username + password);
        $.ajax({url:"../Controller/connexion.php",type:"POST",data:{username:username, password:password}, success:function(data) {
               
                    // console.log(data);
                     window.location.replace("../../Backend/Controller/index.php");
                  
                 
        }
               });
    });
        
    
    function refereshStyle() {
         $.ajax({url:"../View/getStyle.php",type:"POST",data:{}, success:function(data) {
               
                    theme=JSON.parse(data);
                    $("body").css("background-color",theme.primaryColor);
                    $("body").css("border-color",theme.secondaryColor);
                     $("body").css("color",theme.textColor);
                    
                $("body").css("font-family",'"'+theme.font+'"');
             $("h1").css("font-family",'"'+theme.title+'"');
                  
                 
        }});
    }


    refresh_formations(id_ecole);
    refereshStyle(id_ecole);
    
    
   setInterval(function(){refresh_formations();refereshStyle();},5000);

        
    
    
});

