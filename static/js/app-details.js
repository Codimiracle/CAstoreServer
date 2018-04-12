Scrollbar = {}
$(document).ready(
		function() {
			Scrollbar.startx = 0;
			Scrollbar.thumbMoveable = false;
			Scrollbar.delta = 0;
			Scrollbar.percentage = 0;
			Scrollbar.track = $(".scrollbar-track");
			Scrollbar.thumb = $(".scrollbar-thumb");
			Scrollbar.list = Scrollbar.track.prev();
			Scrollbar.measure = function () {
				var new_x = Number.parseInt(this.thumb.css("left")) + this.delta;
				var last_x = this.track.width() - this.thumb.width();
				if (new_x  + this.thumb.width() > this.track.width()) {
					new_x = last_x;
				}
				if (new_x < 0) {
					new_x = 0;
				}
				return new_x / last_x;
			}
			Scrollbar.scrollTo = function (percentage) {
				this.percentage = percentage;
				this.resize();
			}
			Scrollbar.isVisiable = function () {
				return !(this.list.width() < this.list.parent().width());
			} 
			Scrollbar.autovisiable = function () {
				if (this.isVisiable()) {
					this.thumb.show();
					this.track.show();
				} else {
					this.thumb.hide();
					this.track.hide();
					this.scrollTo(0); //复位
				}
			}
			Scrollbar.init = function () {
				this.autovisiable();
				this.resize();
			}
			Scrollbar.resize = function () {
				this.thumb.css({ width : (this.track.width() / this.list.width()) * 100 + "%" });
				this.thumb.css({left: (this.track.width() - this.thumb.width()) * this.percentage});
				this.list.css({left : (this.list.width() - this.track.width()) * -1 * this.percentage });
			}
			Scrollbar.refresh = function (x) {
				this.delta = x - this.startx;
				this.startx = x;
				if (Scrollbar.isVisiable()) {
					Scrollbar.scrollTo(Scrollbar.measure());
				}
			}


			$(window).resize(function () {
				//事件处理
				Scrollbar.init();
			});
			
			$(".scrollbar-thumb").on("mousedown", function(event) {
				// 设定开始坐标
				Scrollbar.startx = event.screenX;
				Scrollbar.thumbMoveable = true;
			}).parent().prev()[0].addEventListener("wheel", function (event) {
				event.preventDefault();
				Scrollbar.delta = event.deltaY * 10;
				Scrollbar.scrollTo(Scrollbar.measure());
			});
			$("body").on("mousemove",function(event) {
				// 设定变化量
				if (Scrollbar.thumbMoveable) {
					Scrollbar.refresh(event.screenX);
				}
			}).on("mouseup", function(event) {
				Scrollbar.thumbMoveable = false;
			});;
			//初始化滑动条
			Scrollbar.init();
		});