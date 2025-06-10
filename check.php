<?php
// Подключаем autoloader библиотеки PhpSpreadsheet
require_once $_SERVER["DOCUMENT_ROOT"] . '/phpspread/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

// Путь к вашему файлу Excel
$excelFilePath = $_SERVER["DOCUMENT_ROOT"] . '/summary.xlsx';

// Загружаем Excel файл
$spreadsheet = IOFactory::load($excelFilePath);

// Получаем активный лист
$sheet = $spreadsheet->getActiveSheet();

// Начинаем вывод таблицы с нумерацией
echo "<div class='container-fluid p-0'><table class='table table-bordered table-striped'>";
echo "<thead><tr><th></th>"; // Пустая ячейка для нумерации строк

// Выводим буквенные заголовки (A, B, C, D, E и т.д.)
$headerIndex = 0;
$highestColumn = $sheet->getHighestColumn(); // Получаем последнюю колонку (например, 'E')
for ($col = 'A'; $col <= $highestColumn; $col++) {
    echo "<th class='position-sticky top-0'>" . $col . "</th>";
}
echo "</tr></thead><tbody>";

// Выводим строки с данными и размерами шрифтов
$rowCount = $sheet->getHighestRow(); // Получаем последнюю строку
for ($row = 1; $row <= $rowCount; $row++) {
    echo "<tr>";
    echo "<td class='position-sticky' style='left: 0; background-color: white;'>" . $row . "</td>"; // Нумерация строк

    for ($col = 'A'; $col <= $highestColumn; $col++) {
        $cell = $sheet->getCell($col . $row); // Получаем ячейку

        // Получаем значение ячейки
        $value = $cell->getValue();

        // Получаем стиль ячейки и размер шрифта
        $style = $cell->getStyle();
        $font = $style->getFont();
        $fontSize = $font->getSize(); // Размер шрифта

        // Выводим ячейку с полем ввода и размером шрифта
        echo "<td class='p-1'><input type='text' class='form-control border-0 rounded-0 p-1' value='" . htmlspecialchars($value) . "' style='font-size:" . $fontSize . "px;'/></td>";
    }

    echo "</tr>";
}
echo "</tbody></table></div>";

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
