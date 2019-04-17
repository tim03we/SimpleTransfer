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

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;

class TransferCMD extends Command {

    public function __construct(SimpleTransfer $plugin)
    {
        parent::__construct("transferserver", "Transfer to another server.", "/transfer <ip> <port> [all]>", ["transfer"]);
        $this->plugin = $plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            if(isset($args[0])) {
                if(isset($args[1])) {
                    if($args[2] === "all") {
                        if($sender->hasPermission("transfer.all")) {
                            foreach (Server::getInstance()->getOnlinePlayers() as $allPlayers) {
                                $allPlayers->transfer("$args[0]", "$args[1]", "SimpleTransfer");
                            }
                        }
                    } else {
                        $sender->transfer("$args[0]", "$args[1]", "SimpleTransfer");
                    }
                } else {
                    $sender->sendMessage($this->getUsage());
                }
            } else {
                $sender->sendMessage($this->getUsage());
            }
        } else {
            $sender->sendMessage("Run this command InGame!");
        }
    }
}