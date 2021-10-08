<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('<?= STRIPE_PUBLIC_KEY ?>');
    var elements = stripe.elements();
</script>