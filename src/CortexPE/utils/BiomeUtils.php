<?php

/**
 *
 * MMP""MM""YMM               .M"""bgd
 * P'   MM   `7              ,MI    "Y
 *      MM  .gP"Ya   ,6"Yb.  `MMb.   `7MMpdMAo.  ,pW"Wq.   ,pW"Wq.`7MMpMMMb.
 *      MM ,M'   Yb 8)   MM    `YMMNq. MM   `Wb 6W'   `Wb 6W'   `Wb MM    MM
 *      MM 8M""""""  ,pm9MM  .     `MM MM    M8 8M     M8 8M     M8 MM    MM
 *      MM YM.    , 8M   MM  Mb     dM MM   ,AP YA.   ,A9 YA.   ,A9 MM    MM
 *    .JMML.`Mbmmd' `Moo9^Yo.P"Ybmmd"  MMbmmd'   `Ybmd9'   `Ybmd9'.JMML  JMML.
 *                                     MM
 *                                   .JMML.
 * This file is part of TeaSpoon.
 *
 * TeaSpoon is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * TeaSpoon is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with TeaSpoon.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author CortexPE
 * @link https://CortexPE.xyz
 *
 */

declare(strict_types = 1);

namespace CortexPE\utils;


use CortexPE\Utils;
use pocketmine\level\Level;

class BiomeUtils extends Utils {
	public const OCEAN = 0;
	public const PLAINS = 1;
	public const DESERT = 2;
	public const MOUNTAINS = 3;
	public const FOREST = 4;
	public const TAIGA = 5;
	public const SWAMP = 6;
	public const RIVER = 7;
	public const HELL = 8;
	public const END = 9;
	public const FROZEN_OCEAN = 10;
	public const FROZEN_RIVER = 11;
	public const ICE_PLAINS = 12;
	public const ICE_MOUNTAINS = 13;
	public const MUSHROOM_ISLAND = 14;
	public const MUSHROOM_ISLAND_SHORE = 15;
	public const BEACH = 16;
	public const DESERT_HILLS = 17;
	public const FOREST_HILLS = 18;
	public const TAIGA_HILLS = 19;
	public const SMALL_MOUNTAINS = 20;
	public const COLD_BEACH = 26;
	public const BIRCH_FOREST = 27;
	public const BIRCH_FOREST_HILLS = 28;
	public const ROOFED_FOREST = 29;
	public const COLD_TAIGA = 30;
	public const COLD_TAIGA_HILLS = 31;
	public const MEGA_TAIGA = 32;
	public const MEGA_TAIGA_HILLS = 33;
	public const EXTREME_HILLS_PLUS = 34;
	public const SAVANNA = 35;
	public const SAVANNA_PLATEAU = 36;
	public const MESA = 37;
	public const MESA_PLATEAU_F = 38;
	public const MESA_PLATEAU = 39;

	/** @var float[] */
	public const BIOME_ID_TO_TEMPERATURE = [
		self::OCEAN                 => 0.5,
		self::PLAINS                => 0.8,
		self::DESERT                => 2.0,
		self::MOUNTAINS             => 0.2,
		self::FOREST                => 0.7,
		self::TAIGA                 => 0.25,
		self::SWAMP                 => 0.8,
		self::RIVER                 => 0.5,
		self::HELL                  => 2.0,
		self::END                   => 0.5,
		self::FROZEN_OCEAN          => 0.0,
		self::FROZEN_RIVER          => 0.0,
		self::ICE_PLAINS            => 0.0,
		self::ICE_MOUNTAINS         => 0.0,
		self::MUSHROOM_ISLAND       => 0.9,
		self::MUSHROOM_ISLAND_SHORE => 0.9,
		self::BEACH                 => 0.8,
		self::DESERT_HILLS          => 2.0,
		self::FOREST_HILLS          => 0.7,
		self::TAIGA_HILLS           => 0.25,
		self::SMALL_MOUNTAINS       => 20,
		self::COLD_BEACH            => 0.05,
		self::BIRCH_FOREST          => 0.6,
		self::BIRCH_FOREST_HILLS    => 0.6,
		self::ROOFED_FOREST         => 0.7,
		self::COLD_TAIGA            => -0.5,
		self::COLD_TAIGA_HILLS      => -0.5,
		self::MEGA_TAIGA            => 0.3,
		self::MEGA_TAIGA_HILLS      => 0.25,
		self::EXTREME_HILLS_PLUS    => 0.2,
		self::SAVANNA               => 1.2,
		self::SAVANNA_PLATEAU       => 1.1,
		self::MESA                  => 2.0,
		self::MESA_PLATEAU_F        => 2.0,
		self::MESA_PLATEAU          => 2.0,
	];

	public static function getBiomeTemperature(int $x, int $z, Level $level): float{
		$id = $level->getBiomeId($x, $z);
		if(isset(self::BIOME_ID_TO_TEMPERATURE[$id])){
			return self::BIOME_ID_TO_TEMPERATURE[$id];
		}

		return 0.0;
	}

	public static function getTemperature(int $x, int $y, int $z, Level $level): float{
		$temp = self::getBiomeTemperature($x, $z, $level);
		$seaLevel = 64; // default sea level
		// TODO: Biome classification
		if($y > $seaLevel){
			$temp -= ($seaLevel - $y) * 0.00166666667;
		}

		return $temp;
	}

}