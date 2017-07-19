function dis_type_checked() {
    var v=$("input:radio[name='disability_type']:checked").val();
    if (v==3) {
        $("#disability_type").removeAttr("readonly")
    }else {
        $("#disability_type").attr("readonly", true)
    }
}
function hou_sit_checked() {
    var v=$("input:radio[name='housing_situation']:checked").val();
    if (v==2) {
        $("#housing_situation").removeAttr("readonly")
    }else {
        $("#housing_situation").attr("readonly", true)
    }
}

$(function(){
    $.get("../index",function(data){
        $.each(data,function(index, val){
            if (index == "disability_type"  && val ==3) {
                $("input:radio[name='"+index+"'][value='3']").attr("checked", true);
                $("#disability_type").removeAttr("readonly")
            }
            if (index == 'is_rural_student' && val == "是") {
                $("input:radio[name='ide-reg-oer-res'][value='0']").attr("checked", true);
            } else {
                $("input:radio[name='ide-reg-oer-res'][value='1']").attr("checked", true);
            }
            var value = $("input:radio[name='"+index+"'][value='"+val+"']").attr("checked", true);

        })
    })
    $.get("../ajax/family", function(data){
        $.each(data.members,function(index, val){
            $.each(val,function(key, value){
                $("input[name='members["+index+"]["+key+"]']").val(value);
            })
        })
    })
})
