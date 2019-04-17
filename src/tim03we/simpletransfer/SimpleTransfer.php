<?php

/*
 * Copyright (c) 2019 tim03we  < https://github.com/tim03we >
 * Discord: tim03we | TP#9129
 *
 * This software is distributed under "GNU General Public License v3.0".
 * This license allows you to use it and/or modify it but you are not at
 * all allowed to sell this plugin at any cost. If found doing so the
 * necessary action required would be taken.
 *
 * SimpleTransfer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License v3.0 for more details.
 *
 * You should have received a copy of the GNU General Public License v3.0
 * along with this program. If not, see
 * <https://opensource.org/licenses/GPL-3.0>.
 */

namespace tim03we\simpletransfer;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class SimpleTransfer extends PluginBase implements Listener {

    public function onEnable()
    {
        Server::getInstance()->getCommandMap()->unregister(Server::getInstance()->getCommandMap()->getCommand("transferserver"));
        $this->getServer()->getCommandMap()->register("transferserver", new TransferCMD($this));
        $this->getLogger()->info("Plugin was enabled! By tim03we");
    }

    public function onDisable()
    {
        $this->getLogger()->info("Plugin was disabled! By tim03we");
    }
}