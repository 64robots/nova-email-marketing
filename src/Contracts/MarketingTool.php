<?php

namespace R64\NovaEmailMarketing\Contracts;

interface MarketingTool
{
    /**
     * Retrieve all lists
     */
    function getLists();

    /**
     * Retireve list with listId
     *
     * @param  string  $listId
     */
    function getList($listId);

    function isConnected();
}
