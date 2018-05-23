<?php class TExplorer{
    public $dir;//$dir
    public function __construct( $dir = NULL ){//конструктор
        $this->dir = str_replace(array("\\", "//"), "/", $dir);//устанавливаем $dir, замен€€ все \ и // на /
    }
    public function setDir( $dir ){//установить начальную директорию

        $this->dir = str_replace(array("\\", "//"), "/", $dir);//устанавливаем $dir, замен€€ все \ и // на /
    }
    public function gotoUp( $dir ){//ѕереход в директорию
        if( $this->dir{strlen($this->dir)-1} == "/" )//если последний символ строка - слеш(/)
            $this->dir.=str_replace(array("//", "\\", '/', '\\'), "", $dir);//
        else
            $this->dir.="/".str_replace(array("//", "\\", '/', '\\'), "", $dir);//добавл€ем к dir значение $dir, замен€€ все \ и // на /
    }
    public function gotoDown( ){//¬ернутьс€ в предыдущую папку
        $this->dir = self::getLastDir( $this->dir );//устанавливаем dir  на путь, который вернет getLastDir
    }
    public function getLastDir( $dir ){//вернуть последнюю директорию
        $dir = substr($dir, 0, strrpos($dir, "/"));//находим последнее вхождение / в строке $dir, и обрезаем
        return $dir;//возвращаем обработанную строку
    }
    public function getFiles( ){#вернуть файлы из текущей директории
        $aFiles = scandir($this->dir);//сканируем директорию, на выходе получаем массив

        foreach( $aFiles as $file){//разбираем массив
            if( $file == "." or $file == ".." ) continue;//ничего не делаем, если названи€ файлов - . или ..
            if( !is_file($this->dir.'/'.$file) )//если это Ќ≈ файл
                $return .= "/".$file."  [ѕапка]"._BR_;//к переменной приписываем о том, что это папка
            else//иначе
               $return.= $file."    [‘айл ".fileExt($this->dir.'/'.$file."]")._BR_;//это файл, пишем что это файл и его формат
        }
        return $return;//возвращаем папки/файлы

    }
}
global $obj, $arrEx, $eR;//дл€ большей удобности
$obj = new TExplorer( "C:/" );//устанавливаем начальную директорию
c("files")->text = "/..."._BR_.$obj->getFiles( );//записываем в listbox1 список всех файлов и папок начальной директории
c("openFile->files")->text = c("files")->text = "/..."._BR_.$obj->getFiles( );

$size = osinfo_disktotal( "C:\\" );
$size = $size ? $size : 1;
$total = number_format(($size / 1024) / 1024 / 1024, 2) . ' GB';

$size = osinfo_diskfree( "C:\\" );
$size = $size ? $size : 1;
$free = number_format(($size / 1024) / 1024 / 1024, 2);

c("lsCSize")->caption = "—вободно " . $free . " из " . $total;

$self->doubleBuffered = true;
