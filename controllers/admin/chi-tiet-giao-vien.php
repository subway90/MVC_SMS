<?php

# [MODEL]

# [VARIABLE]
$show_history = false;

# [HANDLE]
if(isset($_POST['type'])) $show_history = true;

# [DATA]
$data = [
    'show_history' => $show_history,
];

# [RENDER]
view('admin','Chi tiết giáo viên','teacher-detail',$data);