$(function(){
	var url = 'http:lottery.php';

	$.getJSON(url,function(data){
		// console.log(data);
		var imgs =  data;
		for (var i = 0; i < imgs.length; i++) {
			imgs[i]
		};
	});

	lottery.init('lottery'); 
    $("#lottery a").click(function() { 
        if (click) { 
            return false; 
        } else { 
            lottery.speed = 100; 
            $.post("ajax.php", { 
                uid: 1 
            }, 
            function(data) { //获取奖品，也可以在这里判断是否登陆状态 
                $("#lottery").attr("prize_site", data.prize_site); 
                $("#lottery").attr("prize_id", data.prize_id); 
                $("#lottery").attr("prize_name", data.prize_name); 
                roll(); 
                click = true; 
                return false; 
            }, 
            "json") 
        } 
    }); 
})