<?php
/**
 * Nama Class: Form
 * Deskripsi: Class untuk membuat form input sederhana (modular).
 */

class Form
{
    private array $fields = [];
    private string $action;
    private string $submit;

    public function __construct(string $action = "", string $submit = "Submit Form")
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function addField(
        string $name,
        string $label,
        string $type = "text",
        string $value = "",
        array $attrs = []
    ): void {
        $this->fields[] = [
            "name"  => $name,
            "label" => $label,
            "type"  => $type,
            "value" => $value,
            "attrs" => $attrs,
        ];
    }

    public function displayForm(): void
    {
        echo "<form action='" . htmlspecialchars($this->action) . "' method='POST' class='card'>";
        echo "<table class='form-table'>";

        foreach ($this->fields as $f) {

            // Jika field hidden, cetak langsung tanpa baris tabel
            if (($f["type"] ?? "") === "hidden") {
                echo "<input type='hidden' name='" . htmlspecialchars($f["name"]) . "' value='" . htmlspecialchars($f["value"]) . "'>";
                continue;
            }

            $attrStr = "";
            foreach (($f["attrs"] ?? []) as $k => $v) {
                $attrStr .= " " . htmlspecialchars($k) . "='" . htmlspecialchars((string)$v) . "'";
            }

            echo "<tr>";
            echo "<td class='label' align='right'>" . htmlspecialchars($f["label"]) . "</td>";
            echo "<td>";
            echo "<input class='input' type='" . htmlspecialchars($f["type"]) . "' name='" . htmlspecialchars($f["name"]) . "' value='" . htmlspecialchars($f["value"]) . "'" . $attrStr . ">";
            echo "</td>";
            echo "</tr>";
        }

        echo "<tr><td colspan='2' class='actions'>";
        echo "<input class='btn btn-primary' type='submit' value='" . htmlspecialchars($this->submit) . "'>";
        echo "</td></tr>";

        echo "</table>";
        echo "</form>";
    }
}
?>
