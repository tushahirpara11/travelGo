var destext = "";
$(function () {
    $(".mainchk").click(function () {
        var ch = $(this).prop("checked");
        if(ch == true) {
            $(".innerallchk").prop("checked","checked");
        } else {
            $(".innerallchk").prop("checked","");
        }
    });
});
function chkmain() {
    var len = $(".innerallchk:unchecked").length;
    if(len == 0) {
        $(".mainchk").prop("checked","checked");
    } else {
        $(".mainchk").prop("checked","");
    }
}
function scrolltop() {
    $('html, body').animate({ scrollTop: 0 }, 'slow', function () {});
}
function openfancy() {
    $('.fancybox-media').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        type : "image",
        helpers: {
            media: {}
        }
    });
}
function openvideo(){
    $('.fancybox-media').fancybox({
        'type' : 'iframe',
        // hide the related video suggestions and autoplay the video
        'href' : this.href.replace(new RegExp('watch\\?v=', 'i'), 'embed/') + '?rel=0&autoplay=1',
        'overlayShow' : true,
        'centerOnScroll' : true,
        'speedIn' : 100,
        'speedOut' : 50,
        'width' : 640,
        'height' : 480
    });
}
function getdemo() {
    alert(1);
}
function datatable(url,param) {
    param.push({"targets": 0,"data": 0,
        "render": function(data, type, row) {
            return '<input onclick="chkmain();" class="innerallchk" name="allchk[]" type="checkbox" value="'+data+'">';
        }
    });
    var dt = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": url,
        "columnDefs": param,
        responsive: true
    });
    $("#example2_filter input").unbind();
    $('#example2_filter input').bind('keyup', function(e) {
       if(e.keyCode == 13) {
            dt.search(this.value).draw();
        }
    });    
}
function hidemsg(after,speed) {
    setTimeout(function () {
        $("#msg").fadeOut(speed);
    },after);
}

function makedropdown(val,sel,type,id) {
    var html = "<option value=''>Select Value</option>";
    var forloop = val;
    if(type == 'char') {
        forloop = val.length;
    }
    var x = 0;
    for(var i=1;i<=forloop;i++) {
       var printval = i;
       var print = i;
        if(type == 'char') {
            print = id[x];
            printval = val[x];
            x++;
        }
        var selection = "";
        if(print==sel) {
            selection = "selected";
        }
       html += "<option "+selection+" value='"+print+"'>"+printval+"</option>"; 
    }
    return html;
}
function makechk(val,sel,id,icon,url) {
    if(sel != 0) {
        sel = sel.split(',');
    }
    var html = "";
    var forloop = val.length;
    for(var i=0;i<forloop;i++) {
        var s = "";
        if($.inArray(id[i],sel) != -1) {
            s = "checked";
        }
        var img = "";
        if(icon != null && icon[i] != null) {
            img = '<img src="'+url+icon[i]+'">';
        }
        html += "<div><input "+s+" type='checkbox' name='amenities[]' value='"+id[i]+"'> "+img+" "+val[i]+"</div>";
    }
    return html;
}
function settext(t) {
    destext = t;
}
function getlocationdropdown(type,id,url,sel) {
        var putid = type.toLowerCase();
        $.post(url+"location/getval",{type:type,id:id},function (res) {
            var text = "Select "+type;
            if(type == "City") {
                if(destext != "") {
                    text = destext;
                } else {
                    text = "Destinations";
                }
            }
            var html = '<option value="">'+text+'</option>';
            $.each(res.data,function (i,item) {
                var selected = '';
                if(sel == item.id) {
                    var selected = 'selected';
                }
                html += '<option '+selected+' value="'+item.id+'">'+item.name+'</option>';
            })
            $("select[name="+putid+"]").html(html);
            if($.isFunction($.fn.selectric) == true) {
                $("select").selectric('refresh');
            }
        });
}
function load() {
    $("body").addClass("loading");
}
function unload() {
    $("body").removeClass("loading");
}
function generaterating(star) {
    var html = "";
        for(var i=0;i<5;i++) {
            var cl = "";
            if(i<star) {
                cl = "fastarfill";
            }
            html += '<i class="fa fa-star fastar '+cl+'"></i>';
        }
        return html;
}
function paynow(bookingid,url) {
    load();
    $.post(url+"social/paypal/"+bookingid,{},function (res) {
        unload();
        if(res.msg == "login") {
            location.href = url;
        }
        if(res.status == "200") {
            location.href = res.data.url;
        } else {
            $("#cmmodal_title").html("Error Message");
            $("#cmmodal_body").html("<p class='error'>"+res.msg+"</p>");
            $("#cmmodal_btn").remove();
            $("#cmmodal").modal("show");
        }
    });
}
function creditcard(bookingid,url) {
    $("#cmmodal_title").html("Credit Card Details");
    var html = '<span class="creditcardmsg"></span><div class="clearfix"></div><input type="hidden" name="bookingid" value="'+bookingid+'"><label class="clforblckclr">Name on card</label><input type="text" name="nameoncard" placeholder="Name" class="form-control"><div class="clearfix"></div><label class="clforblckclr">Credit card number</label><input type="text" name="cardnumber" maxlength="16" placeholder="Card Number" class="form-control"><div class="clearfix"></div><label class="clforblckclr">Expiry Date</label><div class="row"><div class="col-md-12 row"><div class="col-md-6"><input type="text" name="expirymonth" placeholder="Month" maxlength="2" class="form-control"></div><div class="col-md-6"><input type="text" name="expiryyear" placeholder="Year" class="form-control" maxlength="4"></div></div></div><label class="clforblckclr">CVV Code</label><input type="text" name="code" placeholder="Code" class="form-control">';
    $("#cmmodal_body").html(html);
    $("#cmmodal_btn").html("Proceed");
    $("#cmmodal_btn").attr("onclick","addcreditcard('"+url+"')");
    $("#cmmodal").modal("show");
}
function addcreditcard(url) {
    var val = $("#cmmodal_frm").validate({
        rules : {
            nameoncard : {
                required : true
            },
            cardnumber : {
                required : true,
                maxlength : 16,
                minlength : 16
            },
            expirymonth : {
                required : true,
                number : true,
                maxlength : 2,
                minlength : 2
            },
            expiryyear : {
                required : true,
                number : true,
                maxlength : 4,
                minlength : 4
            },
            code : {
                required : true,
                number : true
            }
        }
    });
    if(val.form() == true) {
        load();
        $.post(url+"social/addcard",$("#cmmodal_frm").serialize(),function (res) {
            if(res.msg == 'login') {
                location.href = url;
            }
            if(res.status == "200") {
                location.reload();
            } else {
                unload();
                $("#cmmodal_title").html("Error Message");
                $("#cmmodal_body").html("<p class='error'>"+res.msg+"</p>");
                $("#cmmodal_btn").remove();
            }
        })
    } else {
        return false;
    }
}