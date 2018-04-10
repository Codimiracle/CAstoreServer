$(document).ready(
		function() {
			var scrollbar_startx = 0;
			var scrollbar_thumb_moveable = false;
			var scrollbar_delta = 0;
			// 设定开始坐标
			$(".scrollbar-thumb").on("mousedown", function(event) {
				scrollbar_startx = event.screenX
			});
			// 设定变化量
			$("body").on("mousemove", function(event) {
				scrollbar_delta = event.screenX - scrollbar_startx;
				scrollbar_startx = event.screenX;
				if (scrollbar_thumb_moveable) {
					$(".scrollbar-thumb").css({
						css : "+" + scrollbar_delta + "px"
					});
					console.log(scrollbar_delta);
				}
			});
			// 设定滑动块大小
			$(".scrollbar-thumb").css(
					{
						width : ($(".scrollbar-track").width() / $(
								".app-powerpoint ul").width())
								* 100 + "%"
					});
			// 设置滑块滑动功能
			$(".scrollbar-thumb").on("mousedown", function(event) {
				scrollbar_thumb_movealble = true;
			}).on("mouseup", function(event) {
				scrollbar_thumb_movealble = false;
			});
		});