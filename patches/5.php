<?php
            $x = $this->onlineView->getUserMember();
            $this->userCount = $x["user"];
            $this->memberCount = $x["member"];
            $this->totalMemberCount = $this->onlineView->getTotalMember();

?>
