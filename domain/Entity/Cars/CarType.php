<?php
namespace App\Entity\Cars;
enum CarType
{
    case car;
    case truck;
    case spec_machine; // Todo:: В описании задачи specMachine, а в csv файле spec_machine. Поправить на нужную
}