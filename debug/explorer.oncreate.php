<?php class TExplorer{
    public $dir;//$dir
    public function __construct( $dir = NULL ){//�����������
        $this->dir = str_replace(array("\\", "//"), "/", $dir);//������������� $dir, ������� ��� \ � // �� /
    }
    public function setDir( $dir ){//���������� ��������� ����������

        $this->dir = str_replace(array("\\", "//"), "/", $dir);//������������� $dir, ������� ��� \ � // �� /
    }
    public function gotoUp( $dir ){//������� � ����������
        if( $this->dir{strlen($this->dir)-1} == "/" )//���� ��������� ������ ������ - ����(/)
            $this->dir.=str_replace(array("//", "\\", '/', '\\'), "", $dir);//
        else
            $this->dir.="/".str_replace(array("//", "\\", '/', '\\'), "", $dir);//��������� � dir �������� $dir, ������� ��� \ � // �� /
    }
    public function gotoDown( ){//��������� � ���������� �����
        $this->dir = self::getLastDir( $this->dir );//������������� dir  �� ����, ������� ������ getLastDir
    }
    public function getLastDir( $dir ){//������� ��������� ����������
        $dir = substr($dir, 0, strrpos($dir, "/"));//������� ��������� ��������� / � ������ $dir, � ��������
        return $dir;//���������� ������������ ������
    }
    public function getFiles( ){#������� ����� �� ������� ����������
        $aFiles = scandir($this->dir);//��������� ����������, �� ������ �������� ������

        foreach( $aFiles as $file){//��������� ������
            if( $file == "." or $file == ".." ) continue;//������ �� ������, ���� �������� ������ - . ��� ..
            if( !is_file($this->dir.'/'.$file) )//���� ��� �� ����
                $return .= "/".$file."  [�����]"._BR_;//� ���������� ����������� � ���, ��� ��� �����
            else//�����
               $return.= $file."    [���� ".fileExt($this->dir.'/'.$file."]")._BR_;//��� ����, ����� ��� ��� ���� � ��� ������
        }
        return $return;//���������� �����/�����

    }
}
global $obj, $arrEx, $eR;//��� ������� ���������
$obj = new TExplorer( "C:/" );//������������� ��������� ����������
c("files")->text = "/..."._BR_.$obj->getFiles( );//���������� � listbox1 ������ ���� ������ � ����� ��������� ����������
c("openFile->files")->text = c("files")->text = "/..."._BR_.$obj->getFiles( );

$size = osinfo_disktotal( "C:\\" );
$size = $size ? $size : 1;
$total = number_format(($size / 1024) / 1024 / 1024, 2) . ' GB';

$size = osinfo_diskfree( "C:\\" );
$size = $size ? $size : 1;
$free = number_format(($size / 1024) / 1024 / 1024, 2);

c("lsCSize")->caption = "�������� " . $free . " �� " . $total;

$self->doubleBuffered = true;
