<?PHP

class Alerta
{


    public function add_alerta(string $tipo, string $mensaje)
    {
        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    public function clear_alertas()
    {
        $_SESSION['alertas'] = [];
    }


    public function get_alertas()
    {
        if (!empty($_SESSION['alertas'])) {
            $alertasActuales = "";
            foreach ($_SESSION['alertas'] as $alerta) {
                $alertasActuales .= $this->print_alerta($alerta);
            }
            $this->clear_alertas();
            return $alertasActuales;
        } else {
            return null;
        }
    }

    private function print_alerta($alerta): string
    {
        $html = "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";    

        return $html;
    }
}
