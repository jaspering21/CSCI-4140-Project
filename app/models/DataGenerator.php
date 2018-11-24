<?php

class DataGenerator{

	private static function generateTableStart($tableID) {
		return "<table id='$tableID' class='table table-striped table-bordered table-sm' cellspacing='0' width='100%'>";
	}

	private static function generateTableHeader($headerArray) {
		$header = "<thead>
    <tr>";
		foreach($headerArray as $key => $value){
			$header .= "<th class='th-sm'>$key</th>";

		}
		$header .= "</tr></thead>";
		return $header;
	}

	private static function generateTableBody($dataList) {
		$body = "<tbody>";
		foreach ($dataList as $key => $row ){
			$body .= "<tr>";
				foreach ($row as $rowKey => $value){
					$body .="<td>$value</td>";
				}

			$body .= "</tr>";
		}
		$body .= "</tbody";
		return $body;
	}

	private static function generateTableFooter($dataList){
		return "</table>";
	}
	
	public static function generateData($dataList, $tableID){
		$tableHTML = self::generateTableStart($tableID);
		$firstItem = $dataList->top();
		$tableHTML .= self::generateTableHeader($firstItem);
		$tableHTML .= self::generateTableBody($dataList);
		$tableHTML .= self::generateTableFooter($dataList);
		return $tableHTML;
	}
}