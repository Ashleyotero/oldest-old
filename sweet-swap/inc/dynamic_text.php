<?
function get_dyn_text($page_id)
{
	$query_pages		= "SELECT * FROM swap_pages WHERE page_id = '".$page_id."' ORDER BY page_id ASC";
	$result_pages		= mysql_query($query_pages);
	$num_results_pages	= mysql_num_rows($result_pages);
	for($i_p = 0; $i_p < $num_results_pages; $i_p++)
	{
		$page_content	= mysql_result($result_pages,$i_p,"page_content");
	}
	return $page_content;
}
?>