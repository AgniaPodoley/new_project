<?php
class CsidebarMenu extends Msidebarmenu 
{      
    	
	// ���������� ���� � ��
    public function get_menu_from_DB($menu_number){	
        
        $res = $this->return_menu($menu_number); // ������ � ��
		while ($row = mysqli_fetch_array($res))
		{
			$mname[$row['id']] = $row; 
		}
        return $mname;
    }
    
    // �������������� ������ �������� ���������
    public function prepare_childrens($items){
        
        foreach ($items as $item) {
            if ($item["parent_id"]) $childrens[$item["id"]] = $item["parent_id"];
        }
        return $childrens;
    }
    
    //������� ����� ����
    public function printItem($item, $items, $childrens){
    
		echo '<li>';
		//��������� ������� �� ������ ������ �������
		if($item[active_link_in_sidebar]){
			echo "<a href=\"".DOMAINNAME."/?id=$item[id]\"><i class=\"$item[menu_icon] $item[icon_size]\"> </i> $item[menu_name]</a>";
		}
		else{
			echo "<a href=\"\"><i class=\"$item[menu_icon] $item[icon_size]\"> </i> $item[menu_name]</a>";
		}
		
		
		// ���������� �� �������� ��������?
		$ul = false;
		
		//����������� ����, � ������� �� ���� ��� �������� ��������
		while (true) {
			
		  // ���� � ������� $childrens �������� ������� ����������� ��������
		  $key = array_search($item["id"], $childrens); // ���� ��� - �������� � ����� while
		  
		  // ���� �������� ��������� �� ������� 
		  if (!$key) {
			// ���� ���������� �������� ��������, �� ��������� ������
			if ($ul) echo "</ul>"; 
			break; // ������� �� �����
		  }
		  
		  // ������� ��������� ������� (����� �� �� ��������� ��� ���)
		  unset($childrens[$key]); 
		  
		  if (!$ul) {
			echo '<ul>'; // �������� ���������� ������, ���� �������� ��������� ��� �� ����
			$ul = true; // ������������� ����
		  }
		  
		  // ���������� ������� ��� �������� ��������
		  echo self::printItem($items[$key], $items, $childrens); 
		}
		echo "</li>";
	}  
    
}
?>