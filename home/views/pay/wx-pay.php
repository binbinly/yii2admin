<?php

?>

<br/><br/><br/>
<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式二</div><br/>
<img alt="模式二扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?=urlencode($pay_code_url);?>" style="width:150px;height:150px;"/>


<script type="text/javascript">
    $(function(){

        setInterval("ajax_pay_status()", 1000);


    });
    var url = "<?= \yii\helpers\Url::to(['/pay/ajax-pay-status','order_sn'=>$order_sn])?>";
    function ajax_pay_status(){
        $.get(url, function(data){
            if(data.stat == 1) {
                layer.msg('交易成功');
                window.location.href = "/";
            }
        },'json');
    }
</script>

