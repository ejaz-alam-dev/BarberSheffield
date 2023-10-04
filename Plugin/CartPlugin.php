<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Barber\Sheffield\Plugin;

use Magento\Checkout\Model\Cart;
use Magento\SalesRule\Model\CouponFactory;

class CartPlugin
{
    protected CouponFactory $couponFactory;

    public function __construct(
        CouponFactory $couponFactory
    ) {
        $this->couponFactory = $couponFactory;
    }

    public function afterAddProduct(
        Cart $subject,
             $result,
             $productInfo,
             $requestInfo = null
    ) {
        $couponCode = 'TESTCOUPON';
        $selectedSku = '24-mb02';

        foreach ($subject->getItems() as $item) {
            $sku = $item->getSku();

            if ($sku == $selectedSku && $this->isValidCouponCode($couponCode)) {
                $quote = $subject->getQuote();
                $quote->setCouponCode($couponCode)->collectTotals();
                break;
            }
        }
        return $result;
    }

    protected function isValidCouponCode($couponCode): bool
    {
        $coupon = $this->couponFactory->create()->load($couponCode, 'code');
        return (bool) $coupon->getId();
    }
}
