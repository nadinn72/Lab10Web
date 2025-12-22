<?php
// File: form.php
class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $method = "POST";
    private $style = 'modern';

    public function __construct($action, $submit, $method = "POST", $style = 'modern')
    {
        $this->action = $action;
        $this->submit = $submit;
        $this->method = $method;
        $this->style = $style;
    }

    public function displayForm()
    {
        $this->renderCSS();
        
        echo "<div class='form-container form-" . $this->style . "'>";
        echo "<form action='" . $this->action . "' method='" . $this->method . "'>";
        
        if ($this->style == 'modern') {
            echo '<div class="form-card">';
            echo '<h2 class="form-title">' . $this->submit . '</h2>';
            
            for ($j = 0; $j < count($this->fields); $j++) {
                echo '<div class="form-group">';
                echo '<label for="' . $this->fields[$j]['name'] . '" class="form-label">' . $this->fields[$j]['label'] . '</label>';
                echo '<input type="text" id="' . $this->fields[$j]['name'] . '" name="' . $this->fields[$j]['name'] . '" class="form-input" placeholder="Masukkan ' . $this->fields[$j]['label'] . '">';
                echo '</div>';
            }
            
            echo '<div class="form-group">';
            echo '<button type="submit" class="btn-submit">' . $this->submit . '</button>';
            echo '</div>';
            echo '</div>';
        } else {
            // Style klasik/tabel
            echo '<table class="form-table" width="100%" border="0">';
            for ($j = 0; $j < count($this->fields); $j++) {
                echo "<tr><td align='right' class='form-label'>" . $this->fields[$j]['label'] . "</td>";
                echo "<td><input type='text' name='" . $this->fields[$j]['name'] . "' class='form-input'></td></tr>";
            }
            echo "<tr><td colspan='2'>";
            echo "<input type='submit' value='" . $this->submit . "' class='btn-submit'></td></tr>";
            echo "</table>";
        }
        
        echo "</form>";
        echo "</div>";
    }

    private function renderCSS()
    {
        echo "
        <style>
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
        }
        
        .form-modern .form-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            color: white;
        }
        
        .form-modern .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 16px;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            background: rgba(255,255,255,0.1);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: white;
            background: rgba(255,255,255,0.2);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.1);
        }
        
        .form-input::placeholder {
            color: rgba(255,255,255,0.6);
        }
        
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: white;
            color: #764ba2;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            background: #f8f9fa;
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .form-table {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .form-table .form-label {
            padding: 10px;
            font-weight: bold;
        }
        
        .form-table .form-input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 300px;
        }
        
        .form-table .btn-submit {
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        </style>
        ";
    }

    public function addField($name, $label)
    {
        $this->fields[] = [
            'name' => $name,
            'label' => $label
        ];
    }
    
    public function addFields($fieldsArray)
    {
        foreach ($fieldsArray as $field) {
            $this->addField($field['name'], $field['label']);
        }
    }
}
?>