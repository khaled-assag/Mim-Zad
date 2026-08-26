@props(['endsAtIso'])

<div x-data="mzCountdown('{{ $endsAtIso }}')" class="inline-flex items-center gap-1.5" dir="ltr"
     role="timer" aria-label="العد التنازلي للمزاد">
    <template x-if="!finished">
        <div class="flex items-stretch gap-1.5">
            <div class="min-w-[44px] rounded-card border border-brand-emerald/40 bg-brand-surface px-1.5 py-1 text-center">
                <span class="block text-base font-bold leading-none text-brand-white" x-text="d">00</span>
                <span class="mt-0.5 block text-[10px] text-brand-muted">يوم</span>
            </div>
            <div class="min-w-[44px] rounded-card border border-brand-emerald/40 bg-brand-surface px-1.5 py-1 text-center">
                <span class="block text-base font-bold leading-none text-brand-white" x-text="h">00</span>
                <span class="mt-0.5 block text-[10px] text-brand-muted">ساعة</span>
            </div>
            <div class="min-w-[44px] rounded-card border border-brand-emerald/40 bg-brand-surface px-1.5 py-1 text-center">
                <span class="block text-base font-bold leading-none text-brand-white" x-text="m">00</span>
                <span class="mt-0.5 block text-[10px] text-brand-muted">دقيقة</span>
            </div>
            <div class="min-w-[44px] rounded-card border border-brand-emerald/40 bg-brand-surface px-1.5 py-1 text-center">
                <span class="block text-base font-bold leading-none text-brand-emerald" x-text="s">00</span>
                <span class="mt-0.5 block text-[10px] text-brand-muted">ثانية</span>
            </div>
        </div>
    </template>
    <template x-if="finished">
        <span class="mz-badge !border-white/25 !text-brand-muted">انتهى المزاد</span>
    </template>
</div>
