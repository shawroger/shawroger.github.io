代码呈上，注释明确不多说，按下 ESC 退出脚本

```autohotkey
; 定义轮盘位置
x := 586  ; 设置目标位置的 x 坐标
y := 919  ; 设置目标位置的 y 坐标

; 创建一个热键来退出循环
Esc::ExitApp

; 无限循环
Loop {
	; 生产轮盘随机移动偏移度
	delta_x := Random(-100, 100)
	delta_y := Random(-100, 100)
	
	; 随机普通攻击次数
	clickCount := Random(1, 6)
	
	; 移动持续时间
	moving_time := 0
	if (delta_x*delta_y < 0) {
		moving_time := Random(500, 1000)
	} else if (delta_x <= 0 && delta_y <= 0) {
		moving_time := Random(200, 500)
	} else {
		moving_time := Random(2000, 5000)
	}
	
	;; 移动英雄
	; 初始化鼠标位置到轮盘处
    	MouseMove(x, y, 0)
    	; 按下左键并保持
    	Click("L Down")
    	; 移动鼠标到指定位置
    	MouseMove(x+delta_x, y-delta_y)
    	; 休眠一段时间，防止 CPU 占用过高
    	Sleep(moving_time)
    	; 松开左键
    	Click("L Up")
	
	; 三技能升级
	MouseMove(2089,992, 0)
	Click("L")
	
	; 二技能升级
	MouseMove(1785,709, 0)
	Click("L")
	
	; 一技能升级
	MouseMove(1677,910, 0)
	Click("L")
	
	; 买装备
	MouseMove(433,499, 0)
	Click("L")
	
	; 召唤师技能，如：惩戒
	MouseMove(1592,1030, 0)
	Click("L")
	
	; 恢复
	MouseMove(1445,1032, 0)
	Click("L")
	
	; 三技能施法
	MouseMove(2074,721, 0)
	Click("L")
	
	; 二技能施法
	MouseMove(1906,838, 0)
	Click("L")
	
	; 一技能施法
	MouseMove(1779,1028, 0)
	Click("L")
	
	; 普通攻击
	MouseMove(2109,1002, 0)
	Loop clickCount {
		Click("L")
		Sleep(10)  ; 每次点击后等待 10 毫秒
	}
}


```