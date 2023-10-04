<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Barber\Sheffield\Plugin;

use Magento\Quote\Model\Quote;
use Magento\SalesRule\Model\CouponFactory;
class CartDiscountRemovePlugin
{
    protected CouponFactory $couponFactory;

    public function __construct(
        CouponFactory $couponFactory
    ) {
        $this->couponFactory = $couponFactory;
    }

    public function beforeRemoveItem(
        Quote $subject,
              $itemId
    ) {
        $item = $subject->getItemById($itemId);

        if ($item) {
            $product = $item->getProduct();

            if ($product->getSku() === '24-mb02') {
                $quoteCouponCode = $subject->getCouponCode();

                if ($quoteCouponCode === 'TESTCOUPON') {
                    $subject->setCouponCode('')
                    ->collectTotals()
                    ->save();
                }
            }
        }

    }
}
