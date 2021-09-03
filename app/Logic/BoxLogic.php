<?php

namespace App\Logic;

use DVDoug\BoxPacker\Packer;
use DVDoug\BoxPacker\Test\TestBox;
use DVDoug\BoxPacker\Test\TestItem;

class BoxLogic
{
    //All parts thickness
    const THICKNESS = 100;      //MM

    //Pallets dimension
    const LONGER_SIDE = 120;    //CM

    const SHORTER_SIDE = 100;   //CM

    const FULL_HEIGHT = 180;    //CM

    /**
     * @param array $parts
     * @return int
     */
    public function getNumberOfBoxesNeededFor(array $parts):int
    {
        $packer = new Packer();

        $packer->addBox(new TestBox(
            'Pallet',
            (self::SHORTER_SIDE * 10),
            (self::LONGER_SIDE * 10),
            (self::FULL_HEIGHT * 10),
            10,
            (self::SHORTER_SIDE * 10),
            (self::LONGER_SIDE * 10),
            (self::FULL_HEIGHT * 10),
            1000));

        foreach ($parts as $part){
            $packer->addItem(new TestItem('Part', $part[0], self::THICKNESS, $part[1], 0, false), 1);
        }

        $packedBoxes = $packer->pack();

        return count($packedBoxes);
    }
}
