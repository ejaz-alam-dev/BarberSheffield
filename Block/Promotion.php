<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Barber\Sheffield\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\ScopeInterface;

class Promotion extends Template
{
    const XML_PATH_PROMOTION_MESSAGE = 'configurations/module_configs/promotion_message';
    const XML_PATH_PROMOTION_ENABLE = 'configurations/module_configs/enable_promotion';
    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    public function displayPromotion()
    {
        return $this->isPromotionEnabled() ? $this->getPromotionMessage() : null;
    }

    private function getPromotionMessage()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_PROMOTION_MESSAGE, ScopeInterface::SCOPE_STORE);
    }

    private function isPromotionEnabled(): bool
    {
        return (bool) $this->scopeConfig->getValue(self::XML_PATH_PROMOTION_ENABLE, ScopeInterface::SCOPE_STORE);
    }
}

