<?php
// подготавливаем обьекты
$all_menus = new \app\classes\Callmenus(); // список доступных меню
$smain_menu = new \app\classes\CsidebarMenu();

// получаем массив всех меню с БД $items[id] = array;
$menus_items = $all_menus->get_menus_from_DB();

echo '<ul id="demo1" class="nav">';

// выведедем каждое меню по отдельности (одна итерация - одно меню)

foreach ($menus_items as $item) {
    
	if($item["header_visible"]== 1){
		echo "<h4>".$item["menu_name"]."</h4>"; // выведем название меню
	}
	
	// получаем массив всего меню с БД $items[id] = array;

	$items = $smain_menu->get_menu_from_DB($item["id"]);

	// подготавливаем массив дочерных элементов $childrens[$item["id"]] = $item["parent_id"]
	$childrens = $smain_menu->prepare_childrens($items); 

	

	// выводим каждый элемент
	foreach ($items as $item) {
		// если элемент не имеет дочерных элементов выводим его
		if(!$item["parent_id"]) {
			echo $smain_menu->printItem($item, $items, $childrens);
		} 

	} 

	
}

echo "</ul>";    
?>   