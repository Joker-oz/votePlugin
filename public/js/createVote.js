$(document).ready(function(){
    //增加投票选项
    var index = 1;//投票选项计数器
    var cderIndex = 1;//手动添加候选人监视变量
    var flag = 1;//反复隐藏与显示逻辑变量
    var addOption = function(){
        index++;
        var parentDiv = $('<div></div>',{"class":"options"});
        var childrenSpan = $('<span></span>',{"class":"add-num"});
        childrenSpan.html(index);
        var childrenInput = $('<input>',{"class":"inputOption","type":"text","name":"options_ "+index,"placeholder":"请输入投票选项","required":"required"});
        parentDiv.append(childrenSpan,childrenInput);
        $('.choice-container').append(parentDiv);
    };
    $('#addOpt').click(function(){
        if(index >= 20){
            alert("最多添加20个投票选项！");
        }
        else{
       addOption();
        }   
    });
    //添加投票选项结束


    $('.inputTitle').focus(function(){     //输入框获得焦点时美化边框
        $(this).css('border','1px solid #00AEAE');
    });
    $('.inputTitle').blur(function(){
        $(this).css('border','1px solid rgba(0,0,0,.4)');
    });
    //点击上传本地图片按钮调出本地磁盘 PS:仅限HTML文档中存在的第一个候选人上传照片信息里
    function openDialog(){
        $('#file').click();//相当于把点击事件转移到file input本身上来
    }
    $('#submitPic').click(function(){
        openDialog();//相当于把点击事件转移到file input本身上来
    });
    //文档中存在的第一个候选人上传照片时触发文件名显示
    $('#file').change(function(){
        var filepath = $(this).val();
        if(filepath.indexOf('jpg')!= -1 || filepath.indexOf('png')!= -1){
            var arr = filepath.split('\\');
            console.log(arr);
            var fileName = arr[arr.length-1];
            console.log(fileName);
            $('#first-show').val(fileName);
        }else{
            $('#first-show').val('');
            alert("上传的文件类型有误,请上传.jpg或.png类型的图片");
        }
    });

    //手动添加候选人备选单元格
    var addCandidater = function(){
        cderIndex++;
        var parentTR = $('<tr></tr>');
        var childrenTDCname = $('<td></td>');
        var TDCnameInner = $('<input>',{"id":"cname","class":"txtarea height","type":"text","name":"candidater-name_" + cderIndex,"placeholder":"请输入候选人姓名","required":"required"});
        childrenTDCname.append(TDCnameInner);
        var childrenTDCinfo = $('<td></td>');
        var TDCinfoInner = $('<input>',{"id":"cinfo","class":"txtarea height","type":"text","name":"candidater-info_" + cderIndex,"placeholder":"输入简介","required":"required"});
        childrenTDCinfo.append(TDCinfoInner);
        var childrenTDCpic = $('<td></td>');
        var TDCpicInner = $('<input>',{"type":"file","name":"candidater-pic_" + cderIndex});
        var TDCpicInnerButton = $('<button></button>',{"type":"button","class":"btn btn-warning submit-pic"});
        var TDCpicShowBar = $('<input>',{"type":"text","class":"showfile","disabled":"disabled"});
        TDCpicInnerButton.on('click',function(){
            TDCpicInner.click();
        });//点击事件转移，调用对应生成的文件域以此来提交图片信息

        //提交文件后显示文件名
        TDCpicInner.on('change',function(){
            /*获取路径字符串*/
            var filepath = $(this).val();
            if(filepath.indexOf('jpg')!= -1 || filepath.indexOf('png')!= -1){
                var arr = filepath.split('\\');
                console.log(arr);
                var fileName = arr[arr.length-1];
                console.log(fileName);
                TDCpicShowBar.val(fileName);
            }
            else{
                TDCpicShowBar.val('');
                alert("上传的文件类型有误,请上传.jpg或.png类型的图片");
            }
        });
        TDCpicInnerButton.html("上传本地照片");
        childrenTDCpic.append(TDCpicInner,TDCpicInnerButton,TDCpicShowBar);
        parentTR.append(childrenTDCname,childrenTDCinfo,childrenTDCpic);
        $('#target-tb').append(parentTR);
    };

    //点击添加候选人时 自动加一行单元格
    $('#addCder').click(function(){
        addCandidater();
    });
    
    //用户在批量增加候选人时点击确认后，读取输入的数字
    $('#confirm').click(function(){
        var cderNum = parseInt($('#cderNumber').val());//val()函数取到的是字符串要转化为数字
        for(var i = 0; i < cderNum; i++){
            addCandidater();
        };//批量增加即循环执行手动添加候选人单元格的函数
    });

    //批量增加框的隐藏与显示
    $('#num-addCder').click(function(){
        if(flag % 2 != 0)
        {
            $('#div-toggle').css('display','inline-block');
        }
        else
        {
            $('#div-toggle').hide();
        }
        flag++;
    });
    $('#confirm').click(function(){
        $('#div-toggle').toggle();
        $('#cderNumber').val('');
        flag++;
    });



   //人物类投票以及事物类投票切换
   var manBar = $('#vote-of-man-item');//候选人类投票创建区域
   var projectBar = $('#vote-of-project-item');//事物类投票创建区域
   var ofProject = $('.vote-of-project');//两个事物类投票按钮
   var ofMan = $('.vote-of-man');//两个人物类投票按钮
   for(var i = 0; i < ofProject.length; i++){
    ofProject[i].onclick = function(){

        manBar.hide();
        projectBar.show();
        };
    };
   for (var i = 0; i < ofMan.length; i++) {
       ofMan[i].onclick = function(){
        projectBar.hide();
        manBar.show();
        };
    };

   
    
   
});