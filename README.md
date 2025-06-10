# 📊 Excel Preview

**Excel Preview** is a lightweight web application that lets you preview Excel `.xlsx` files directly in the browser with a table layout similar to spreadsheet editors.

## 🚀 Features

- Reads `.xlsx` files using the **SimpleXLSX** library
- Displays Excel content as a responsive HTML table
- Row and column labels like "A", "B", "C" and line numbers for easy orientation
- Uses **Bootstrap 5** for clean and mobile-friendly design
- Inline editing in HTML inputs (visual only, no saving yet)


## 🛠️ Built With

- **PHP** – backend logic
- **HTML + Bootstrap 5.3** – responsive front-end
- **[SimpleXLSX](https://github.com/shuchkin/simplexlsx)** – lightweight PHP library to parse `.xlsx`

## ⚙️ How to Use

1. Place your Excel file as `summary.xlsx` in the root folder.
2. Make sure the `simplexlsx-master/src/SimpleXLSX.php` file is present.
3. Open `index.php` in your browser via local server (e.g. `http://localhost/index.php`).
4. The file will be parsed and displayed as an interactive table.

## 📌 Notes

- Data is only previewed, not saved.
- All cells are rendered as `<input>` elements for easy copy/edit.
- For better Excel support (formulas, formats), consider switching to PhpSpreadsheet.

## 📄 License

MIT — free for personal and commercial use.

---

> Developed by Temirkhan