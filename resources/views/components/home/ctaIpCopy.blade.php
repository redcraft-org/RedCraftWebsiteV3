<button x-data="{ show: false, ...ctaAnimate }" class="btn btn-lg btn-primary flex flex-col gap-5"
    x-on:click="$clipboard('play.redcraft.org'); ctaIpCopy();">
    <div :class="show ? 'invisible' : ''" x-transition>
        <div class="text-xl">Rejoindre le <b>serveur</b></div>
        <div class="text-sm">69 joueurs en ligne</div>
    </div>
    <div class="text-sm absolute" x-show="show" x-transition x-cloak>Adresse IP copiée !</div>
</button>

<script>
    window.ctaAnimate = {
        ctaIpCopy() {
            this.show = true;
            setTimeout(() => {
                this.show = false;
            }, 3000);
        }
    }
</script>
