<?php
            $x = $this->patchworksView->getOnlineMember();
            $this->userCount = $x["user"];
            $this->memberCount = $x["member"];
            //$this->xxx = $x["xxx"];
            $this->totalMemberCount = $this->onlineView->getTotalMember();

?>
