<?php
// Подключаем библиотеку
$file = $_SERVER["DOCUMENT_ROOT"] . '/simplexlsx-master/src/SimpleXLSX.php';
if (file_exists($file)) {
    require_once $file;
} else {
    echo "Файл SimpleXLSX.php не найден.";
    exit;
}

// Подключаем пространство имен
use Shuchkin\SimpleXLSX;

// Укажите путь к вашему Excel-файлу
$excelFilePath = $_SERVER["DOCUMENT_ROOT"] . '/summary.xlsx';

if ($xlsx = SimpleXLSX::parse($excelFilePath)) {
    $rows = $xlsx->rows(); // Получаем все строки из Excel
} else {
    die('Ошибка при чтении файла: ' . SimpleXLSX::parseError());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Viewer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid p-0">
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th></th> <!-- Пустая ячейка для нумерации строк -->
                <?php
                // Выводим буквенные заголовки (A, B, C, D, E и т.д.)
                $headerIndex = 0;
                foreach ($rows[0] as $header) {
                    $columnLetter = chr(65 + $headerIndex); // Генерация букв для колонок (A, B, C, ...)
                    echo "<th class='position-sticky top-0 text-center bg-body-secondary'>" . $columnLetter . "</th>";
                    $headerIndex++;
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            // Выводим строки с нумерацией
            for ($i = 1; $i < count($rows); $i++) {
                echo "<tr>";
                echo "<th class='position-sticky text-center bg-body-secondary' style='left: 0; background-color: white;'>" . $i . "</th>"; // Нумерация строк
                foreach ($rows[$i] as $cell) {
                    echo "<td class='p-0 h-100'><input type='text' class='form-control border-0 rounded-0 p-1 h-100 text-center' style='font-size:12px;' value='" . htmlspecialchars($cell) . "'/></td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
