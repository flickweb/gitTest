

{
    let elem = document.querySelector("#date");
    //let Sid = document.querySelector("#Sid");

    elem.addEventListener(
        "change",
        () => {
            $.ajax({
                url:'tyekku.php',
                type:'GET',
                cache: false,
                dataType:'json',
                data: {
                    Sid: $('#Sid').val(),
                    data: $('#date').val(),
                    //Json.parse
                    // Sid: Sid.value,
                    //data: $('#d').val(),
                }
            }).done(function(data){
                // alert('成功');
                if(data["status"] == false) {
                    alert("この日付は選択できません。");
                    elem.value = "";
                }

            }).fail(function(msg, XMLHttpRequest, textStatus, errorThrown){
                alert(msg);
                console.log(XMLHttpRequest.status);
                console.log(textStatus);
                console.log(errorThrown);
            });
            
        }
    );
};