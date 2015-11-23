!function(e, t, n, r) {
	XenForo.BlockedThreadTooltip = function(t) {
		var n = t.data("description");
		if (n && e(n).length) {
			e(n).addClass("xenTooltip blockedThreadTip").appendTo("body");
			t.tooltip(XenForo.configureTooltipRtl({
				effect : "slide",
				slideOffset : 30,
				offset : [ 30, 10 ],
				slideInSpeed : XenForo.speed.xfast,
				slideOutSpeed : 50 * XenForo._animationSpeedMultiplier,
				predelay : 250,
				position : "bottom right",
				tip : n
			}));
			t.click(function() {
				e(this).data("tooltip").hide()
			})
		}
	};
	XenForo.register("a.blocked", "XenForo.BlockedThreadTooltip")
}(jQuery, this, document)