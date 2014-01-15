<?php
class block_listas extends block_base {
    public function init() {
		
        $this->title = get_string('listas', 'block_listas');
    }
    
    public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }
 
    $this->content = new stdClass;
    $this->content->text = '<div class="listasblock">';
    
    $this->render_users();
    
    
	
    $this->content->text .= '</div>';
    $this->content->footer = '';
 
    return $this->content;
	}
	
	
	public function render_courses(){
		global $OUTPUT, $DB; 
		$i = 1;
		if (!empty($this->config->text)) {
			$this->content->text = $this->config->text;
		}
			 
		// This is the new code.
		if ($courses = $DB->get_records('course', array('visible' => $i)) {
		
			foreach ($courses as $course) {
				$this->content->text .= '<div class="listas">';
				
				$this->content->text .= '<div class="fullname"><a href="' . $CFG->wwwroot . '/course/view.php?id=' . $course->id . '">' . shortname($course) . '</a>';
				
			}
			$this->content->text .= '</div>';
		}
		$this->content->text .= '</div>';
		
		return $this->content->text;
	} 
	
	public function render_users(){
		global $DB; 
		$i = 1;
		
			 $this->content->text .= '<div class="listas">';
		// This is the new code.
		if ($users = $DB->get_records('user', array('confirmed' => $i)) {
			//$this->content->text .= html_writer::start_tag('ul');
			foreach ($users as $user) {
				
				$this->content->text .= '<div class="fullname"><a href="' . $CFG->wwwroot . '/user/profile.php?id=' . $user->id . '">' . fullname($user) . '</a>';
			
			}
			$this->content->text .= '</div>';
		}
		$this->content->text .= '</div>';
		
		return $this->content->text;
	}  
	
	
	
	
	
	
	
	
	
	
	
	public function applicable_formats()
    {
        return array('all' => true, 'mod' => true, 'tag' => true);
    }
	
	function has_config() {
		return false;
	}
	
	
	public function instance_allow_multiple() {
		return true;
	}
}   
